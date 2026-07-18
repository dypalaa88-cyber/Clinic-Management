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
use App\Models\Specialty;

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

                    // (3) الوجهة
                    Radio::make('destination_type')
                        ->label('الوجهة')
                        ->options([
                            'existing' => 'نسخ إلى لائحة موجودة',
                            'new'      => 'إنشاء لائحة جديدة',
                        ])
                        ->default('new')
                        ->required()
                        ->reactive(),

                    // (4) لائحة الوجهة
                    Select::make('destination_id')
                        ->label('اللائحة الوجهة')
                        ->options(function ($get) {
                            $sourceId = $get('source_id');
                            return PriceList::where('id', '!=', $sourceId)->pluck('name', 'id');
                        })
                        ->searchable()
                        ->visible(fn ($get) => $get('destination_type') === 'existing')
                        ->required(fn ($get) => $get('destination_type') === 'existing'),

                    // (5) اسم اللائحة الجديدة
                    TextInput::make('new_name')
                        ->label('اسم اللائحة الجديدة')
                        ->visible(fn ($get) => $get('destination_type') === 'new')
                        ->required(fn ($get) => $get('destination_type') === 'new')
                        ->maxLength(100),

                    // (6) نطاق النسخ
                    Radio::make('copy_scope')
                        ->label('نطاق النسخ')
                        ->options([
                            'all'      => 'نسخ كل البنود',
                            'category' => 'نسخ تصنيف أو تخصص محدد',
                        ])
                        ->default('all')
                        ->required()
                        ->reactive(),

                    // (7) نوع التصفية — معطل إذا اختار "الكل"
                    Select::make('filter_type')
                        ->label('نوع التصفية')
                        ->options([
                            'category'  => 'تصنيف (أدوية، مستلزمات...)',
                            'specialty' => 'تخصص (عظام، باطنة...)',
                        ])
                        ->visible(fn ($get) => $get('copy_scope') === 'category')
                        ->required(fn ($get) => $get('copy_scope') === 'category')
                        ->reactive(),

                    // (8) اختيار التصنيف — الأدوية والمستلزمات فقط
                    Select::make('category')
                        ->label('اختر التصنيف')
                        ->options([
                            'medicine' => 'دواء',
                            'supply'   => 'مستلزم',
                        ])
                        ->visible(fn ($get) => $get('filter_type') === 'category')
                        ->required(fn ($get) => $get('filter_type') === 'category'),

                    // (9) اختيار التخصص
                    Select::make('specialty_id')
                        ->label('اختر التخصص')
                        ->options(Specialty::pluck('name', 'id'))
                        ->searchable()
                        ->visible(fn ($get) => $get('filter_type') === 'specialty')
                        ->required(fn ($get) => $get('filter_type') === 'specialty'),

                    // (10) نوع تعديل السعر
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

                    // (11) نسبة الزيادة
                    TextInput::make('percentage')
                        ->label('نسبة الزيادة (%)')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(100)
                        ->default(10)
                        ->visible(fn ($get) => $get('price_adjustment_type') === 'percentage')
                        ->required(fn ($get) => $get('price_adjustment_type') === 'percentage'),

                    // (12) قيمة الزيادة الثابتة
                    TextInput::make('fixed_amount')
                        ->label('قيمة الزيادة (جنيه)')
                        ->numeric()
                        ->minValue(1)
                        ->default(10)
                        ->visible(fn ($get) => $get('price_adjustment_type') === 'fixed')
                        ->required(fn ($get) => $get('price_adjustment_type') === 'fixed'),
                ])
                ->action(function (array $data) {
                    $source = PriceList::with('items')->findOrFail($data['source_id']);

                    if ($data['destination_type'] === 'new') {
                        $destination = PriceList::create([
                            'name'        => $data['new_name'],
                            'description' => 'منسوخة من: ' . $source->name,
                            'is_active'   => true,
                        ]);
                    } else {
                        $destination = PriceList::findOrFail($data['destination_id']);
                    }

                    $query = $source->items();

                    if ($data['copy_scope'] === 'category') {
                        if ($data['filter_type'] === 'category') {
                            $query->where('category', $data['category']);
                        } elseif ($data['filter_type'] === 'specialty') {
                            $query->where('specialty_id', $data['specialty_id']);
                        }
                    }

                    $items = $query->get();
                    $copiedCount = 0;

                    foreach ($items as $item) {
                        $newPrice = $item->price;

                        if ($data['price_adjustment_type'] === 'percentage') {
                            $newPrice = $item->price + ($item->price * $data['percentage'] / 100);
                        } elseif ($data['price_adjustment_type'] === 'fixed') {
                            $newPrice = $item->price + $data['fixed_amount'];
                        }

                        PriceListItem::create([
                            'price_list_id' => $destination->id,
                            'specialty_id'  => $item->specialty_id,
                            'name'          => $item->name,
                            'category'      => $item->category,
                            'price'         => round($newPrice, 2),
                            'cost'          => $item->cost,
                            'code'          => $item->code,
                            'is_active'     => $item->is_active,
                        ]);

                        $copiedCount++;
                    }

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