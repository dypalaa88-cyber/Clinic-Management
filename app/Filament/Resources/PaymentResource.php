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
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'الفواتير والمدفوعات';
    protected static ?string $modelLabel = 'فاتورة';
    protected static ?string $pluralModelLabel = 'الفواتير والمدفوعات';

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
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('patient.first_name')
                    ->label('المريض')
                    ->formatStateUsing(fn ($record) => $record->patient?->first_name . ' ' . $record->patient?->last_name)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('appointment.doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->appointment?->doctor?->first_name . ' ' . $record->appointment?->doctor?->last_name)
                    ->placeholder('—'),

                TextColumn::make('contract.name')
                    ->label('العقد')
                    ->placeholder('—'),

                TextColumn::make('total_amount')
                    ->label('الإجمالي')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('paid_amount')
                    ->label('المدفوع')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('remaining_amount')
                    ->label('المتبقي')
                    ->money('EGP')
                    ->sortable(),

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

                TextColumn::make('receiver.name')
                    ->label('المستلم')
                    ->placeholder('—'),

                TextColumn::make('created_at')
                    ->label('تاريخ السداد')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'paid'    => 'مسدد',
                        'partial' => 'مسدد جزئياً',
                        'pending' => 'غير مسدد',
                    ]),

                Filter::make('created_at')
                    ->label('تاريخ السداد')
                    ->form([
                        DatePicker::make('date_from')->label('من تاريخ'),
                        DatePicker::make('date_to')->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['date_from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['date_to'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPayments::route('/'),
        ];
    }
}