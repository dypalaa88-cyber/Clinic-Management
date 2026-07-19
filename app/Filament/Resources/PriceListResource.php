<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\PriceListResource\Pages;
use App\Filament\Resources\PriceListResource\RelationManagers\SpecialtiesRelationManager;
use App\Models\PriceList;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

// (3) تعريف كلاس PriceListResource
class PriceListResource extends Resource
{
    // (4) ربط الـ Resource بموديل PriceList
    protected static ?string $model = PriceList::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'لوائح الأسعار';
    protected static ?string $modelLabel = 'لائحة أسعار';
    protected static ?string $pluralModelLabel = 'لوائح الأسعار';

    // (7) تجميع القائمة الجانبية — مجموعة "التسعير والعقود"
    protected static ?string $navigationGroup = 'التسعير والعقود';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل لائحة
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم اللائحة')
                    ->required()
                    ->maxLength(100),

                Textarea::make('description')
                    ->label('الوصف')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مفعّلة')
                    ->default(true),
            ]);
    }

    /**
     * (9) دالة table(): جدول عرض اللوائح
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم اللائحة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('items_count')
                    ->label('عدد البنود')
                    ->counts('items')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('مفعّلة')
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
            SpecialtiesRelationManager::class,
        ];
    }

    /**
     * (11) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPriceLists::route('/'),
            'create' => Pages\CreatePriceList::route('/create'),
            'edit'   => Pages\EditPriceList::route('/{record}/edit'),
        ];
    }
}