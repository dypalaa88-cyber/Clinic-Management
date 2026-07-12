<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    protected static ?string $title = 'كشف حساب المريض';

    protected static ?string $modelLabel = 'دفعة';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#'),

                // (1) تفاصيل الخدمات
                TextColumn::make('items.name')
                    ->label('الخدمات')
                    ->listWithLineBreaks()
                    ->bulleted(),

                TextColumn::make('total_amount')
                    ->label('الإجمالي')
                    ->money('EGP')
                    ->summarize(Sum::make()->label('إجمالي الكل')->money('EGP')),

                TextColumn::make('paid_amount')
                    ->label('المدفوع')
                    ->money('EGP')
                    ->summarize(Sum::make()->label('إجمالي المدفوع')->money('EGP')),

                TextColumn::make('remaining_amount')
                    ->label('المتبقي')
                    ->money('EGP')
                    ->summarize(Sum::make()->label('إجمالي المتبقي')->money('EGP')),

                TextColumn::make('payment_method')
                    ->label('طريقة الدفع')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'cash'      => 'نقدي',
                        'card'      => 'بطاقة',
                        'insurance' => 'تأمين',
                        'corporate' => 'تعاقد',
                        default     => $state,
                    })
                    ->badge(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'paid'    => 'مسدد',
                        'partial' => 'مسدد جزئياً',
                        'pending' => 'غير مسدد',
                        default   => $state,
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'paid'    => 'success',
                        'partial' => 'warning',
                        'pending' => 'danger',
                        default   => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('التاريخ')
                    ->dateTime('Y-m-d H:i'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}