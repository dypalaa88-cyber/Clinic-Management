<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\SpecialtyResource\Pages;
use App\Models\Specialty;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

// (3) تعريف كلاس SpecialtyResource
class SpecialtyResource extends Resource
{
    // (4) ربط الـ Resource بموديل Specialty
    protected static ?string $model = Specialty::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'التخصصات';
    protected static ?string $modelLabel = 'تخصص';
    protected static ?string $pluralModelLabel = 'التخصصات';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل تخصص
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) name: اسم التخصص
                TextInput::make('name')
                    ->label('اسم التخصص')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),

                // (9) description: وصف التخصص
                Textarea::make('description')
                    ->label('الوصف')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // (10) is_active: تفعيل/تعطيل التخصص
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (11) دالة table(): جدول عرض التخصصات
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (12) id: رقم التخصص
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (13) name: اسم التخصص
                TextColumn::make('name')
                    ->label('اسم التخصص')
                    ->searchable()
                    ->sortable(),

                // (14) description: الوصف (مختصر)
                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                // (15) is_active: أيقونة تفعيل/تعطيل
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),

                // (16) created_at: تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    /**
     * (17) دالة getRelations(): العلاقات (فارغة حالياً - سنضيف الأطباء لاحقاً)
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (18) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSpecialties::route('/'),
            'create' => Pages\CreateSpecialty::route('/create'),
            'edit'   => Pages\EditSpecialty::route('/{record}/edit'),
        ];
    }
}