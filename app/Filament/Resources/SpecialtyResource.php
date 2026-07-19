<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\SpecialtyResource\Pages;
use App\Filament\Resources\SpecialtyResource\RelationManagers\PriceListItemsRelationManager;
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

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'الأطباء والعيادات';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل تخصص
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم التخصص')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),

                Textarea::make('description')
                    ->label('الوصف')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (9) دالة table(): جدول عرض التخصصات
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم التخصص')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    /**
     * (10) دالة getRelations(): Relation Managers
     */
    public static function getRelations(): array
    {
        return [
            PriceListItemsRelationManager::class,
        ];
    }

    /**
     * (11) دالة getPages(): صفحات الـ Resource
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