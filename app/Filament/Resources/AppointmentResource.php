<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'المواعيد';
    protected static ?string $modelLabel = 'موعد';
    protected static ?string $pluralModelLabel = 'المواعيد';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('المريض')
                    ->relationship('patient', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('room_id')
                    ->label('الغرفة')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                DatePicker::make('appointment_date')
                    ->label('تاريخ الموعد')
                    ->required(),

                TimePicker::make('appointment_time')
                    ->label('وقت الموعد')
                    ->required(),

                Select::make('type')
                    ->label('نوع الموعد')
                    ->options([
                        'scheduled' => 'محجوز مسبقاً',
                        'walk_in'   => 'حضور مباشر',
                    ])
                    ->default('scheduled')
                    ->required(),

                Select::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending'     => 'قيد الانتظار',
                        'confirmed'   => 'مؤكد',
                        'in_progress' => 'جاري الكشف',
                        'completed'   => 'مكتمل',
                        'cancelled'   => 'ملغي',
                        'no_show'     => 'لم يحضر',
                    ])
                    ->default('pending')
                    ->required(),

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
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
                    ->formatStateUsing(fn ($record) => $record->patient->first_name . ' ' . $record->patient->last_name)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->doctor->first_name . ' ' . $record->doctor->last_name)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('—'),

                TextColumn::make('appointment_date')
                    ->label('التاريخ')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('appointment_time')
                    ->label('الوقت')
                    ->time('H:i'),

                TextColumn::make('type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'scheduled' ? 'محجوز' : 'مباشر')
                    ->badge()
                    ->color(fn ($state) => $state === 'scheduled' ? 'primary' : 'warning'),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending'     => 'قيد الانتظار',
                        'confirmed'   => 'مؤكد',
                        'in_progress' => 'جاري الكشف',
                        'completed'   => 'مكتمل',
                        'cancelled'   => 'ملغي',
                        'no_show'     => 'لم يحضر',
                        default       => $state,
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'pending'     => 'gray',
                        'confirmed'   => 'info',
                        'in_progress' => 'warning',
                        'completed'   => 'success',
                        'cancelled'   => 'danger',
                        'no_show'     => 'danger',
                        default       => 'gray',
                    }),

                // (1) عمود "تم الكشف" — Toggle يشتغل مباشرة من الجدول
                ToggleColumn::make('is_completed')
                    ->label('تم الكشف')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name),

                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending'     => 'قيد الانتظار',
                        'confirmed'   => 'مؤكد',
                        'in_progress' => 'جاري الكشف',
                        'completed'   => 'مكتمل',
                        'cancelled'   => 'ملغي',
                        'no_show'     => 'لم يحضر',
                    ]),

                Filter::make('appointment_date')
                    ->form([
                        DatePicker::make('date_from')->label('من تاريخ'),
                        DatePicker::make('date_to')->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['date_from'], fn ($q, $date) => $q->whereDate('appointment_date', '>=', $date))
                            ->when($data['date_to'], fn ($q, $date) => $q->whereDate('appointment_date', '<=', $date));
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit'   => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}