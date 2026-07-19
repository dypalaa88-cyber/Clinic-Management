<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\PriceListItemResource\Pages;
use App\Models\PriceListItem;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس PriceListItemResource
class PriceListItemResource extends Resource
{
    // (4) ربط الـ Resource بموديل PriceListItem
    protected static ?string $model = PriceListItem::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'بنود الأسعار';
    protected static ?string $modelLabel = 'بند سعر';
    protected static ?string $pluralModelLabel = 'بنود الأسعار';

    // (7) إخفاء الشاشة من القائمة الجانبية — البنود تُدار من داخل اللوائح والتخصصات
    protected static bool $shouldRegisterNavigation = false;

    /**
     * (8) دالة form(): نموذج إضافة وتعديل بند سعر
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('price_list_id')
                    ->label('اللائحة')
                    ->relationship('priceList', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('specialty_id')
                    ->label('التخصص')
                    ->relationship('specialty', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                TextInput::make('name')
                    ->label('اسم الخدمة / الصنف')
                    ->required()
                    ->maxLength(200),

                Select::make('category')
                    ->label('التصنيف')
                    ->options([
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        'service'    => 'خدمة طبية',
                    ])
                    ->required(),

                TextInput::make('price')
                    ->label('سعر البيع (جنيه)')
                    ->numeric()
                    ->required()
                    ->reactive(),

                TextInput::make('cost')
                    ->label('سعر التكلفة (جنيه)')
                    ->numeric()
                    ->nullable()
                    ->rules([
                        function ($get) {
                            $price = $get('price');
                            if ($price === null) {
                                return [];
                            }
                            return ['numeric', 'max:' . $price];
                        },
                    ]),

                TextInput::make('code')
                    ->label('الكود الداخلي')
                    ->maxLength(50)
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (9) دالة table(): جدول عرض بنود الأسعار
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('priceList.name')
                    ->label('اللائحة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('specialty.name')
                    ->label('التخصص')
                    ->placeholder('—')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم الخدمة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'medicine'   => 'دواء',
                            'supply'     => 'مستلزم',
                            'lab'        => 'تحليل معملي',
                            'radiology'  => 'أشعة',
                            'service'    => 'خدمة طبية',
                            default      => $state,
                        };
                    })
                    ->badge(),

                TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('code')
                    ->label('الكود')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('price_list_id')
                    ->label('اللائحة')
                    ->relationship('priceList', 'name'),

                SelectFilter::make('specialty_id')
                    ->label('التخصص')
                    ->relationship('specialty', 'name'),

                SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        'service'    => 'خدمة طبية',
                    ]),
            ]);
    }

    /**
     * (10) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (11) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPriceListItems::route('/'),
            'create' => Pages\CreatePriceListItem::route('/create'),
            'edit'   => Pages\EditPriceListItem::route('/{record}/edit'),
        ];
    }
}