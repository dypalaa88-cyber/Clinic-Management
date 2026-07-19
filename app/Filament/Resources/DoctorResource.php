<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\DoctorResource\Pages;
use App\Models\Doctor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس DoctorResource
class DoctorResource extends Resource
{
    // (4) ربط الـ Resource بموديل Doctor
    protected static ?string $model = Doctor::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'الأطباء';
    protected static ?string $modelLabel = 'طبيب';
    protected static ?string $pluralModelLabel = 'الأطباء';

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'الأطباء والعيادات';

    // (8) إظهار الشاشة في القائمة الجانبية
    protected static bool $shouldRegisterNavigation = true;

    /**
     * (9) دالة form(): نموذج إضافة وتعديل طبيب
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->label('الاسم الأول')
                    ->required()
                    ->maxLength(100),

                TextInput::make('last_name')
                    ->label('الاسم الأخير')
                    ->required()
                    ->maxLength(100),

                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->maxLength(20),

                TextInput::make('license_number')
                    ->label('رقم الترخيص الطبي')
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('specialties')
                    ->label('التخصصات')
                    ->relationship('specialties', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->required(),

                TextInput::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(60),

                TextInput::make('consultation_fee')
                    ->label('رسم الكشف (جنيه)')
                    ->numeric()
                    ->prefix('EGP'),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (10) دالة table(): جدول عرض الأطباء
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('first_name')
                    ->label('الاسم الأول')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_name')
                    ->label('الاسم الأخير')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('specialties.name')
                    ->label('التخصصات')
                    ->badge()
                    ->separator(', '),

                TextColumn::make('consultation_fee')
                    ->label('رسم الكشف')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('specialties')
                    ->label('التخصص')
                    ->relationship('specialties', 'name'),
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
            'index'  => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit'   => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}