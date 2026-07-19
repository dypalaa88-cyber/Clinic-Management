<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
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

// (3) تعريف كلاس PaymentResource
class PaymentResource extends Resource
{
    // (4) ربط الـ Resource بموديل Payment
    protected static ?string $model = Payment::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'فواتير';
    protected static ?string $modelLabel = 'فاتورة';
    protected static ?string $pluralModelLabel = 'فواتير';

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'المالية';

    /**
     * (8) منع إنشاء فاتورة من هذه الشاشة
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * (9) دالة form(): نموذج فارغ (لا يستخدم)
     */
    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    /**
     * (10) دالة table(): جدول عرض الفواتير
     */
    public static function table(Table $table): Table
    {
        return $table
            ->paginated([25])
            ->query(function () {
                return Payment::query()->with(['patient', 'contract', 'appointment.doctor', 'receiver', 'items']);
            })
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),
                TextColumn::make('patient.first_name')
                    ->label('المريض')
                    ->formatStateUsing(function ($record) {
                        return $record->patient?->first_name . ' ' . $record->patient?->last_name;
                    })
                    ->searchable()->sortable(),
                TextColumn::make('total_amount')->label('الإجمالي')->money('EGP')->sortable(),
                TextColumn::make('paid_amount')->label('المدفوع')->money('EGP')->sortable(),
                TextColumn::make('remaining_amount')->label('المتبقي')->money('EGP')->sortable(),
                TextColumn::make('is_locked')
                    ->label('الحالة')
                    ->formatStateUsing(function ($state) {
                        return $state ? '🔒 مقفولة' : '🔓 مفتوحة';
                    })
                    ->badge()
                    ->color(function ($state) {
                        return $state ? 'danger' : 'success';
                    }),
                TextColumn::make('created_at')->label('تاريخ السداد')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->label('حالة الدفع')->options([
                    'paid' => 'مسدد', 'partial' => 'مسدد جزئياً', 'pending' => 'غير مسدد',
                ]),
                Filter::make('created_at')->label('تاريخ السداد')
                    ->form([DatePicker::make('date_from')->label('من تاريخ'), DatePicker::make('date_to')->label('إلى تاريخ')])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['date_from'], function ($query, $date) {
                                return $query->whereDate('created_at', '>=', $date);
                            })
                            ->when($data['date_to'], function ($query, $date) {
                                return $query->whereDate('created_at', '<=', $date);
                            });
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('view_invoice')
                    ->label('فتح الفاتورة')
                    ->icon('heroicon-o-document-text')
                    ->color('primary')
                    ->url(function (Payment $record) {
                        return route('payment.invoice', ['payment' => $record->id]);
                    })
                    ->openUrlInNewTab(),

                Action::make('toggle_lock')
                    ->label(function (Payment $record) {
                        return $record->is_locked ? 'فك' : 'غلق';
                    })
                    ->icon(function (Payment $record) {
                        return $record->is_locked ? 'heroicon-o-lock-open' : 'heroicon-o-lock-closed';
                    })
                    ->color(function (Payment $record) {
                        return $record->is_locked ? 'warning' : 'danger';
                    })
                    ->visible(function () {
                        return auth()->user()->role === 'admin';
                    })
                    ->action(function (Payment $record) {
                        $record->update([
                            'is_locked'  => !$record->is_locked,
                            'locked_by'  => $record->is_locked ? null : auth()->id(),
                            'locked_at'  => $record->is_locked ? null : now(),
                        ]);

                        $message = $record->is_locked ? 'تم فك الفاتورة بنجاح' : 'تم غلق الفاتورة بنجاح';
                        Notification::make()->title($message)->success()->send();
                    }),
            ]);
    }

    /**
     * (11) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (12) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index' => ListPayments::route('/'),
        ];
    }
}