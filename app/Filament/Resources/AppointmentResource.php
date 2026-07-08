<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

// (3) تعريف كلاس AppointmentResource
class AppointmentResource extends Resource
{
    // (4) ربط الـ Resource بموديل Appointment
    protected static ?string $model = Appointment::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'المواعيد';
    protected static ?string $modelLabel = 'موعد';
    protected static ?string $pluralModelLabel = 'المواعيد';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل موعد
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) patient_id: اختيار المريض
                Select::make('patient_id')
                    ->label('المريض')
                    ->relationship('patient', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                // (9) doctor_id: اختيار الطبيب
                Select::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                // (10) room_id: اختيار الغرفة
                Select::make('room_id')
                    ->label('الغرفة')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                // (11) appointment_date: تاريخ الموعد
                DatePicker::make('appointment_date')
                    ->label('تاريخ الموعد')
                    ->required()
                    ->minDate(now()),

                // (12) appointment_time: وقت الموعد
                TimePicker::make('appointment_time')
                    ->label('وقت الموعد')
                    ->required(),

                // (13) type: نوع الموعد
                Select::make('type')
                    ->label('نوع الموعد')
                    ->options([
                        'scheduled' => 'محجوز مسبقاً',
                        'walk_in'   => 'حضور مباشر',
                    ])
                    ->default('scheduled')
                    ->required(),

                // (14) status: حالة الموعد
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

                // (15) notes: ملاحظات
                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    /**
     * (16) دالة table(): جدول عرض المواعيد
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (17) id: رقم الموعد
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (18) patient: اسم المريض
                TextColumn::make('patient.first_name')
                    ->label('المريض')
                    ->formatStateUsing(fn ($record) => $record->patient->first_name . ' ' . $record->patient->last_name)
                    ->searchable()
                    ->sortable(),

                // (19) doctor: اسم الطبيب
                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->doctor->first_name . ' ' . $record->doctor->last_name)
                    ->searchable()
                    ->sortable(),

                // (20) room: اسم الغرفة
                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('—'),

                // (21) appointment_date: التاريخ
                TextColumn::make('appointment_date')
                    ->label('التاريخ')
                    ->date('Y-m-d')
                    ->sortable(),

                // (22) appointment_time: الوقت
                TextColumn::make('appointment_time')
                    ->label('الوقت')
                    ->time('H:i'),

                // (23) type: نوع الموعد
                TextColumn::make('type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'scheduled' ? 'محجوز' : 'مباشر')
                    ->badge()
                    ->color(fn ($state) => $state === 'scheduled' ? 'primary' : 'warning'),

                // (24) status: الحالة (بطاقة ملونة)
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

                // (25) created_at: تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // (26) فلتر حسب الطبيب
                SelectFilter::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name),

                // (27) فلتر حسب الحالة
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

                // (28) فلتر حسب التاريخ
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

    /**
     * (29) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (30) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit'   => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}