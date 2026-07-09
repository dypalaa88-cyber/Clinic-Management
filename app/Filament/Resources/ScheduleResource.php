<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس ScheduleResource
class ScheduleResource extends Resource
{
    // (4) ربط الـ Resource بموديل Schedule
    protected static ?string $model = Schedule::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'جداول الأطباء';
    protected static ?string $modelLabel = 'جدول طبيب';
    protected static ?string $pluralModelLabel = 'جداول الأطباء';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل جدول طبيب
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) schedule_type: اختيار نوع الجدول (دوري أو استثنائي)
                Select::make('schedule_type')
                    ->label('نوع الجدول')
                    ->options([
                        'recurring' => 'دوري (متكرر أسبوعياً)',
                        'override'  => 'جدول استثنائي (يوم واحد)',
                    ])
                    ->default('recurring')
                    ->required()
                    ->reactive(),

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

                // (11) override_date: تاريخ الجدول الاستثنائي (يظهر فقط إذا النوع = override)
                DatePicker::make('override_date')
                    ->label('تاريخ الجدول الاستثنائي')
                    ->visible(fn ($get) => $get('schedule_type') === 'override')
                    ->required(fn ($get) => $get('schedule_type') === 'override')
                    ->minDate(now()),

                // (12) recurring_days: أيام الأسبوع (يظهر فقط إذا النوع = recurring)
                CheckboxList::make('recurring_days')
                    ->label('أيام العمل الأسبوعية')
                    ->options([
                        0 => 'الأحد',
                        1 => 'الإثنين',
                        2 => 'الثلاثاء',
                        3 => 'الأربعاء',
                        4 => 'الخميس',
                        5 => 'الجمعة',
                        6 => 'السبت',
                    ])
                    ->visible(fn ($get) => $get('schedule_type') === 'recurring')
                    ->required(fn ($get) => $get('schedule_type') === 'recurring')
                    ->columns(3),

                // (13) start_date / end_date: نطاق التواريخ للجدول الدوري
                DatePicker::make('start_date')
                    ->label('تاريخ بدء الجدول (اختياري)')
                    ->visible(fn ($get) => $get('schedule_type') === 'recurring'),

                DatePicker::make('end_date')
                    ->label('تاريخ انتهاء الجدول (اختياري)')
                    ->visible(fn ($get) => $get('schedule_type') === 'recurring')
                    ->after('start_date'),

                // (14) start_time: وقت البدء
                TimePicker::make('start_time')
                    ->label('وقت البدء')
                    ->required(),

                // (15) end_time: وقت الانتهاء
                TimePicker::make('end_time')
                    ->label('وقت الانتهاء')
                    ->required()
                    ->after('start_time'),

                // (16) slot_duration: مدة الكشف
                Select::make('slot_duration')
                    ->label('مدة الكشف (دقيقة)')
                    ->options([
                        15 => '15 دقيقة',
                        20 => '20 دقيقة',
                        30 => '30 دقيقة',
                    ])
                    ->default(15)
                    ->required(),

                // (17) max_patients: الحد الأقصى
                TextInput::make('max_patients')
                    ->label('الحد الأقصى للمرضى')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->nullable(),

                // (18) is_active: تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ])
            ->columns(2);
    }

    /**
     * (19) دالة table(): جدول عرض جداول الأطباء
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (20) id
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (21) schedule_type: نوع الجدول
                TextColumn::make('schedule_type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'recurring' ? 'دوري' : 'استثنائي')
                    ->badge()
                    ->color(fn ($state) => $state === 'recurring' ? 'success' : 'warning'),

                // (22) doctor: اسم الطبيب
                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->doctor->first_name . ' ' . $record->doctor->last_name)
                    ->searchable()
                    ->sortable(),

                // (23) room: الغرفة
                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('—'),

                // (24) recurring_days: أيام العمل (للدوري فقط)
                TextColumn::make('recurring_days')
                    ->label('الأيام')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '—';
                        $days = [0 => 'أحد', 1 => 'إثنين', 2 => 'ثلاثاء', 3 => 'أربعاء', 4 => 'خميس', 5 => 'جمعة', 6 => 'سبت'];
                        return collect($state)->map(fn ($d) => $days[$d] ?? '')->join('، ');
                    }),

                // (25) override_date: تاريخ الاستثنائي
                TextColumn::make('override_date')
                    ->label('تاريخ استثنائي')
                    ->date('Y-m-d')
                    ->placeholder('—'),

                // (26) start_time - end_time
                TextColumn::make('start_time')
                    ->label('من')
                    ->time('H:i'),

                TextColumn::make('end_time')
                    ->label('إلى')
                    ->time('H:i'),

                // (27) slot_duration
                TextColumn::make('slot_duration')
                    ->label('مدة الكشف')
                    ->formatStateUsing(fn ($state) => $state . ' دقيقة'),

                // (28) is_active
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                // (29) فلتر حسب النوع
                SelectFilter::make('schedule_type')
                    ->label('النوع')
                    ->options([
                        'recurring' => 'دوري',
                        'override'  => 'استثنائي',
                    ]),

                // (30) فلتر حسب الطبيب
                SelectFilter::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name),
            ]);
    }

    /**
     * (31) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (32) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit'   => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}