<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages\ListPayments;
use App\Models\Payment;
use App\Models\Patient;
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
    protected static ?string $model = Patient::class; // (1) تغيير الموديل إلى Patient
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'فواتير';
    protected static ?string $modelLabel = 'مريض';
    protected static ?string $pluralModelLabel = 'فواتير المرضى';

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
            // (2) عرض المرضى الذين لديهم فواتير فقط
            ->query(fn () => Patient::query()->whereHas('payments')->with('contract'))
            ->columns([
                TextColumn::make('id')->label('كود المريض')->sortable(),
                TextColumn::make('first_name')
                    ->label('اسم المريض')
                    ->formatStateUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()->sortable(),
                TextColumn::make('phone')->label('رقم الهاتف')->searchable(),
                TextColumn::make('contract.name')->label('العقد')->placeholder('—'),
                // (3) إجمالي عدد الفواتير
                TextColumn::make('payments_count')
                    ->label('عدد الفواتير')
                    ->counts('payments')
                    ->sortable(),
                // (4) إجمالي المدفوعات
                TextColumn::make('payments_sum_paid_amount')
                    ->label('إجمالي المدفوع')
                    ->money('EGP')
                    ->sortable(),
                // (5) إجمالي المتبقي
                TextColumn::make('total_remaining')
                    ->label('إجمالي المتبقي')
                    ->state(function (Patient $record) {
                        return $record->payments->sum('remaining_amount');
                    })
                    ->money('EGP')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('contract_id')->label('العقد')->relationship('contract', 'name'),
                Filter::make('search')
                    ->label('بحث')
                    ->form([\Filament\Forms\Components\TextInput::make('query')->label('اسم المريض أو رقم الهاتف')])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['query'], fn ($q, $term) => $q->where(function ($q) use ($term) {
                            $q->where('first_name', 'like', "%{$term}%")->orWhere('last_name', 'like', "%{$term}%")->orWhere('phone', 'like', "%{$term}%");
                        }));
                    }),
            ])
            ->defaultSort('id', 'asc')
            ->actions([
                // (6) زر فتح فواتير المريض
                Action::make('view_invoices')
                    ->label('عرض الفواتير')
                    ->icon('heroicon-o-document-text')
                    ->color('primary')
                    ->url(fn (Patient $record) => route('payment.patient-invoices', ['patient' => $record->id]))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return ['index' => ListPayments::route('/')];
    }
}