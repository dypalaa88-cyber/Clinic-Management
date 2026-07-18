<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages\ListPayments;
use App\Models\Payment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'فواتير';
    protected static ?string $modelLabel = 'فاتورة';
    protected static ?string $pluralModelLabel = 'فواتير';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated([25])
            ->query(fn () => Payment::query()->with(['patient', 'contract', 'appointment.doctor', 'receiver', 'items']))
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),
                TextColumn::make('patient.first_name')
                    ->label('المريض')
                    ->formatStateUsing(fn ($record) => $record->patient?->first_name . ' ' . $record->patient?->last_name)
                    ->searchable()->sortable(),
                TextColumn::make('total_amount')->label('الإجمالي')->money('EGP')->sortable(),
                TextColumn::make('paid_amount')->label('المدفوع')->money('EGP')->sortable(),
                TextColumn::make('remaining_amount')->label('المتبقي')->money('EGP')->sortable(),
                TextColumn::make('is_locked')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => $state ? '🔒 مقفولة' : '🔓 مفتوحة')
                    ->badge()
                    ->color(fn ($state) => $state ? 'danger' : 'success'),
                TextColumn::make('created_at')->label('تاريخ السداد')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->label('حالة الدفع')->options([
                    'paid' => 'مسدد', 'partial' => 'مسدد جزئياً', 'pending' => 'غير مسدد',
                ]),
                Filter::make('created_at')->label('تاريخ السداد')
                    ->form([DatePicker::make('date_from')->label('من تاريخ'), DatePicker::make('date_to')->label('إلى تاريخ')])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['date_from'], fn ($q, $d) => $q->whereDate('created_at', '>=', $d))->when($data['date_to'], fn ($q, $d) => $q->whereDate('created_at', '<=', $d));
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                // (1) فتح الفاتورة في صفحة منفصلة
                Action::make('view_invoice')
                    ->label('فتح الفاتورة')
                    ->icon('heroicon-o-document-text')
                    ->color('primary')
                    ->url(fn (Payment $record) => route('payment.invoice', ['payment' => $record->id]))
                    ->openUrlInNewTab(),

                // (2) غلق/فك الفاتورة
                Action::make('toggle_lock')
                    ->label(fn (Payment $record) => $record->is_locked ? 'فك' : 'غلق')
                    ->icon(fn (Payment $record) => $record->is_locked ? 'heroicon-o-lock-open' : 'heroicon-o-lock-closed')
                    ->color(fn (Payment $record) => $record->is_locked ? 'warning' : 'danger')
                    ->visible(fn () => auth()->user()->role === 'admin')
                    ->action(function (Payment $record) {
                        $record->update(['is_locked' => !$record->is_locked, 'locked_by' => $record->is_locked ? null : auth()->id(), 'locked_at' => $record->is_locked ? null : now()]);
                        Notification::make()->title($record->is_locked ? 'تم فك الفاتورة' : 'تم غلق الفاتورة')->success()->send();
                    }),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return ['index' => ListPayments::route('/')];
    }
}