<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use App\Models\Doctor;
use App\Models\Room;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
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
                // (8) doctor_id: اختيار الطبيب
                Select::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                // (9) room_id: اختيار الغرفة (اختياري)
                Select::make('room_id')
                    ->label('الغرفة')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                // (10) day_of_week: اختيار اليوم
                Select::make('day_of_week')
                    ->label('اليوم')
                    ->options([
                        0 => 'الأحد',
                        1 => 'الإثنين',
                        2 => 'الثلاثاء',
                        3 => 'الأربعاء',
                        4 => 'الخميس',
                        5 => 'الجمعة',
                        6 => 'السبت',
                    ])
                    ->required(),

                // (11) start_time: وقت البدء
                TimePicker::make('start_time')
                    ->label('وقت البدء')
                    ->required(),

                // (12) end_time: وقت الانتهاء
                TimePicker::make('end_time')
                    ->label('وقت الانتهاء')
                    ->required()
                    ->after('start_time'),

                // (13) slot_duration: مدة الكشف بالدقائق
                Select::make('slot_duration')
                    ->label('مدة الكشف (دقيقة)')
                    ->options([
                        15 => '15 دقيقة',
                        20 => '20 دقيقة',
                        30 => '30 دقيقة',
                    ])
                    ->default(15)
                    ->required(),

                // (14) max_patients: الحد الأقصى للمرضى
                TextInput::make('max_patients')
                    ->label('الحد الأقصى للمرضى')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->nullable(),

                // (15) is_active: تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (16) دالة table(): جدول عرض جداول الأطباء
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (17) id: رقم الجدول
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (18) doctor: اسم الطبيب
                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->doctor->first_name . ' ' . $record->doctor->last_name)
                    ->searchable()
                    ->sortable(),

                // (19) room: اسم الغرفة
                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('غير محدد'),

                // (20) day_of_week: اليوم
                TextColumn::make('day_of_week')
                    ->label('اليوم')
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
                        0 => 'الأحد',
                        1 => 'الإثنين',
                        2 => 'الثلاثاء',
                        3 => 'الأربعاء',
                        4 => 'الخميس',
                        5 => 'الجمعة',
                        6 => 'السبت',
                        default => $state,
                    }),

                // (21) start_time - end_time: وقت العمل
                TextColumn::make('start_time')
                    ->label('من')
                    ->time('H:i'),

                TextColumn::make('end_time')
                    ->label('إلى')
                    ->time('H:i'),

                // (22) slot_duration: مدة الكشف
                TextColumn::make('slot_duration')
                    ->label('مدة الكشف')
                    ->formatStateUsing(fn ($state) => $state . ' دقيقة'),

                // (23) is_active: أيقونة تفعيل/تعطيل
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                // (24) فلتر حسب الطبيب
                SelectFilter::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name),

                // (25) فلتر حسب اليوم
                SelectFilter::make('day_of_week')
                    ->label('اليوم')
                    ->options([
                        0 => 'الأحد',
                        1 => 'الإثنين',
                        2 => 'الثلاثاء',
                        3 => 'الأربعاء',
                        4 => 'الخميس',
                        5 => 'الجمعة',
                        6 => 'السبت',
                    ]),
            ]);
    }

    /**
     * (26) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (27) دالة getPages(): صفحات الـ Resource
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