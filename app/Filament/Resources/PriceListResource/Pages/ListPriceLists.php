<?php

namespace App\Filament\Resources\PriceListResource\Pages;

use App\Filament\Resources\PriceListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;
use Filament\Notifications\Notification;
use App\Models\PriceList;
use App\Models\PriceListItem;

class ListPriceLists extends ListRecords
{
    protected static string $resource = PriceListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            // (1) زر نسخ لائحة
            Actions\Action::make('copy_price_list')
                ->label('نسخ لائحة')
                ->icon('heroicon-o-document-duplicate')
                ->color('warning')
                ->form([
                    // (2) اختيار اللائحة المصدر
                    Select::make('source_id')
                        ->label('اللائحة المصدر')
                        ->options(PriceList::pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->reactive(),

                    // (3) الوجهة: لائحة موجودة أو جديدة
                    Radio::make('destination_type')
                        ->label('الوجهة')
                        ->options([
                            'existing' => 'نسخ إلى لائحة موجودة',
                            'new'      => 'إنشاء لائحة جديدة',
                        ])
                        ->default('new')
                        ->required()
                        ->reactive(),

                    // (4) اختيار لائحة الوجهة (تظهر فقط إذا اختار "موجودة")
                    Select::make('destination_id')
                        ->label('اللائحة الوجهة')
                        ->options(function ($get) {
                            $sourceId = $get('source_id');
                            return PriceList::where('id', '!=', $sourceId)->pluck('name', 'id');
                        })
                        ->searchable()
                        ->visible(fn ($get) => $get('destination_type') === 'existing')
                        ->required(fn ($get) => $get('destination_type') === 'existing'),

                    // (5) اسم اللائحة الجديدة (يظهر فقط إذا اختار "جديدة")
                    TextInput::make('new_name')
                        ->label('اسم اللائحة الجديدة')
                        ->visible(fn ($get) => $get('destination_type') === 'new')
                        ->required(fn ($get) => $get('destination_type') === 'new')
                        ->maxLength(100),

                    // (6) نطاق النسخ: الكل أو بند واحد
                    Radio::make('copy_scope')
                        ->label('نطاق النسخ')
                        ->options([
                            'all'  => 'نسخ كل البنود',
                            'one'  => 'نسخ بند واحد فقط',
                        ])
                        ->default('all')
                        ->required()
                        ->reactive(),

                    // (7) اختيار بند واحد (يظهر فقط إذا اختار "بند واحد")
                    Select::make('item_id')
                        ->label('اختر البند')
                        ->options(function ($get) {
                            $sourceId = $get('source_id');
                            if (!$sourceId) return [];
                            return PriceListItem::where('price_list_id', $sourceId)->pluck('name', 'id');
                        })
                        ->searchable()
                        ->visible(fn ($get) => $get('copy_scope') === 'one')
                        ->required(fn ($get) => $get('copy_scope') === 'one'),

                    // (8) نوع تعديل السعر
                    Radio::make('price_adjustment_type')
                        ->label('تعديل الأسعار')
                        ->options([
                            'none'        => 'إبقاء الأسعار كما هي',
                            'percentage'  => 'زيادة بنسبة مئوية (%)',
                            'fixed'       => 'زيادة بقيمة ثابتة (جنيه)',
                        ])
                        ->default('none')
                        ->required()
                        ->reactive(),

                    // (9) نسبة الزيادة (تظهر فقط إذا اختار نسبة مئوية)
                    TextInput::make('percentage')
                        ->label('نسبة الزيادة (%)')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(100)
                        ->default(10)
                        ->visible(fn ($get) => $get('price_adjustment_type') === 'percentage')
                        ->required(fn ($get) => $get('price_adjustment_type') === 'percentage'),

                    // (10) قيمة الزيادة الثابتة (تظهر فقط إذا اختار قيمة ثابتة)
                    TextInput::make('fixed_amount')
                        ->label('قيمة الزيادة (جنيه)')
                        ->numeric()
                        ->minValue(1)
                        ->default(10)
                        ->visible(fn ($get) => $get('price_adjustment_type') === 'fixed')
                        ->required(fn ($get) => $get('price_adjustment_type') === 'fixed'),
                ])
                ->action(function (array $data) {
                    // (11) جلب اللائحة المصدر
                    $source = PriceList::with('items')->findOrFail($data['source_id']);

                    // (12) تحديد اللائحة الوجهة
                    if ($data['destination_type'] === 'new') {
                        $destination = PriceList::create([
                            'name'        => $data['new_name'],
                            'description' => 'منسوخة من: ' . $source->name,
                            'is_active'   => true,
                        ]);
                    } else {
                        $destination = PriceList::findOrFail($data['destination_id']);
                    }

                    // (13) تحديد البنود المراد نسخها
                    $items = $data['copy_scope'] === 'one'
                        ? $source->items->where('id', $data['item_id'])
                        : $source->items;

                    $copiedCount = 0;

                    // (14) نسخ كل بند مع تعديل السعر
                    foreach ($items as $item) {
                        $newPrice = $item->price;

                        if ($data['price_adjustment_type'] === 'percentage') {
                            $newPrice = $item->price + ($item->price * $data['percentage'] / 100);
                        } elseif ($data['price_adjustment_type'] === 'fixed') {
                            $newPrice = $item->price + $data['fixed_amount'];
                        }

                        PriceListItem::create([
                            'price_list_id' => $destination->id,
                            'name'          => $item->name,
                            'category'      => $item->category,
                            'price'         => round($newPrice, 2),
                            'cost'          => $item->cost,
                            'code'          => $item->code,
                            'is_active'     => $item->is_active,
                        ]);

                        $copiedCount++;
                    }

                    // (15) إشعار نجاح
                    Notification::make()
                        ->title('تم نسخ البنود بنجاح')
                        ->body('عدد البنود المنسوخة: ' . $copiedCount . ' | الوجهة: ' . $destination->name)
                        ->success()
                        ->send();
                })
                ->modalHeading('نسخ لائحة أسعار')
                ->modalSubmitActionLabel('نسخ')
                ->modalCancelActionLabel('إلغاء'),
        ];
    }
}