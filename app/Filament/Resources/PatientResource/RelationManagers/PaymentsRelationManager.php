<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Summarizers\Sum;

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
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                // (1) طباعة إجمالي — كل الزيارات
                \Filament\Tables\Actions\Action::make('print_summary')
                    ->label('طباعة كشف إجمالي')
                    ->icon('heroicon-o-printer')
                    ->color('gray')
                    ->url(fn () => route('patient.statement', [
                        'patient' => $this->getOwnerRecord()->id,
                        'mode' => 'summary'
                    ]))
                    ->openUrlInNewTab(),

                \Filament\Tables\Actions\Action::make('print_detailed')
                    ->label('طباعة كشف تفصيلي')
                    ->icon('heroicon-o-document-text')
                    ->color('gray')
                    ->url(fn () => route('patient.statement', [
                        'patient' => $this->getOwnerRecord()->id,
                        'mode' => 'detailed'
                    ]))
                    ->openUrlInNewTab(),
            ])
            // (2) زر طباعة لكل دفعة على حدة
            ->actions([
                \Filament\Tables\Actions\Action::make('print_invoice')
                    ->label('طباعة الفاتورة')
                    ->icon('heroicon-o-printer')
                    ->color('success')
                    ->url(fn ($record) => route('patient.statement', [
                        'patient' => $this->getOwnerRecord()->id,
                        'mode' => 'detailed',
                        'payment_id' => $record->id,
                    ]))
                    ->openUrlInNewTab(),
            ]);
    }
}