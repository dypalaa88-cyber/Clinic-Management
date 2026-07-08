<?php

// (1) تحديد المسار التنظيمي للملف
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

    /**
     * (7) دالة form(): نموذج إضافة وتعديل طبيب
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) first_name: الاسم الأول
                TextInput::make('first_name')
                    ->label('الاسم الأول')
                    ->required()
                    ->maxLength(100),

                // (9) last_name: الاسم الأخير
                TextInput::make('last_name')
                    ->label('الاسم الأخير')
                    ->required()
                    ->maxLength(100),

                // (10) email: البريد الإلكتروني
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                // (11) phone: رقم الهاتف
                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->maxLength(20),

                // (12) license_number: رقم الترخيص
                TextInput::make('license_number')
                    ->label('رقم الترخيص الطبي')
                    ->required()
                    ->unique(ignoreRecord: true),

                // (13) specialties: اختيار التخصصات (علاقة Many-to-Many)
                Select::make('specialties')
                    ->label('التخصصات')
                    ->relationship('specialties', 'name')
                    ->multiple()           // يسمح باختيار أكثر من تخصص
                    ->preload()            // يحمّل الخيارات مسبقاً
                    ->searchable()         // قابل للبحث
                    ->required(),

                // (14) years_of_experience: سنوات الخبرة
                TextInput::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(60),

                // (15) consultation_fee: رسم الكشف
                TextInput::make('consultation_fee')
                    ->label('رسم الكشف (جنيه)')
                    ->numeric()
                    ->prefix('EGP'),

                // (16) is_active: تفعيل/تعطيل الطبيب
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (17) دالة table(): جدول عرض الأطباء
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (18) id: رقم الطبيب
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (19) first_name + last_name: الاسم الكامل
                TextColumn::make('first_name')
                    ->label('الاسم الأول')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_name')
                    ->label('الاسم الأخير')
                    ->searchable()
                    ->sortable(),

                // (20) specialties: عرض التخصصات مفصولة بفواصل
                TextColumn::make('specialties.name')
                    ->label('التخصصات')
                    ->badge()              // يعرض كل تخصص كبطاقة صغيرة
                    ->separator(', '),     // يفصل بين التخصصات بفاصلة

                // (21) consultation_fee: رسم الكشف
                TextColumn::make('consultation_fee')
                    ->label('رسم الكشف')
                    ->money('EGP')
                    ->sortable(),

                // (22) years_of_experience: سنوات الخبرة
                TextColumn::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->sortable(),

                // (23) is_active: أيقونة تفعيل/تعطيل
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),

                // (24) created_at: تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // (25) فلتر حسب التخصص
                SelectFilter::make('specialties')
                    ->label('التخصص')
                    ->relationship('specialties', 'name'),
            ]);
    }

    /**
     * (26) دالة getRelations(): العلاقات (فارغة حالياً)
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
            'index'  => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit'   => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}