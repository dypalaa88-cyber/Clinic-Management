<?php

namespace App\Filament\Resources\PriceListResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use App\Models\PriceListItem;

class SpecialtiesRelationManager extends RelationManager
{
    protected static string $relationship = 'specialties';
    protected static ?string $title = 'التخصصات وأسعارها';
    protected static ?string $modelLabel = 'تخصص';
    protected static ?string $pluralModelLabel = 'التخصصات';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#'),
                TextColumn::make('name')->label('التخصص')->searchable(),
                TextColumn::make('services_count')
                    ->label('عدد الخدمات')
                    ->state(function ($record) {
                        return PriceListItem::where('price_list_id', $this->getOwnerRecord()->id)
                            ->where('specialty_id', $record->id)->count();
                    }),
            ])
            ->actions([
                Action::make('edit_prices')
                    ->label('تعديل الأسعار')
                    ->icon('heroicon-o-pencil')
                    ->modalHeading(function ($record) {
                        return 'أسعار خدمات — ' . $record->name;
                    })
                    ->form(function ($record) {
                        $items = PriceListItem::where('price_list_id', $this->getOwnerRecord()->id)
                            ->where('specialty_id', $record->id)
                            ->get();

                        $fields = [];
                        foreach ($items as $item) {
                            // (1) عرض اسم المعدل بجانب كل خدمة
                            $updatedBy = $item->updater?->name ?? '—';
                            $fields[] = TextInput::make('price_' . $item->id)
                                ->label($item->name . ' | آخر تعديل: ' . $updatedBy)
                                ->numeric()
                                ->default($item->price)
                                ->required();
                        }
                        return $fields;
                    })
                    ->action(function ($record, array $data) {
                        $items = PriceListItem::where('price_list_id', $this->getOwnerRecord()->id)
                            ->where('specialty_id', $record->id)
                            ->get();

                        foreach ($items as $item) {
                            if (isset($data['price_' . $item->id])) {
                                // (2) تحديث السعر + تسجيل المستخدم
                                $item->update([
                                    'price'      => $data['price_' . $item->id],
                                    'updated_by' => auth()->id(),
                                ]);
                            }
                        }

                        Notification::make()->title('تم تحديث الأسعار بنجاح')->success()->send();
                    })
                    ->modalSubmitActionLabel('حفظ الأسعار')
                    ->modalCancelActionLabel('إلغاء'),
            ]);
    }
}