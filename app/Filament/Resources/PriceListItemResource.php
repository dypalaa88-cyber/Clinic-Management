<?php

// (1) تحديد المسار التنظيمي للملف
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
use Filament\Forms\Get;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Validation\Rule;

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

    /**
     * (7) دالة form(): نموذج إضافة وتعديل بند سعر
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) اختيار اللائحة
                Select::make('price_list_id')
                    ->label('اللائحة')
                    ->relationship('priceList', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                // (9) اختيار التخصص (اختياري)
                Select::make('specialty_id')
                    ->label('التخصص')
                    ->relationship('specialty', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                // (10) اسم الخدمة
                TextInput::make('name')
                    ->label('اسم الخدمة / الصنف')
                    ->required()
                    ->maxLength(200),

                // (11) تصنيف الخدمة
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

                // (12) سعر البيع — مطلوب
                TextInput::make('price')
                    ->label('سعر البيع (جنيه)')
                    ->numeric()
                    ->required()
                    ->reactive(),

                // (13) سعر التكلفة — يجب أن لا يتجاوز سعر البيع
                TextInput::make('cost')
                    ->label('سعر التكلفة (جنيه)')
                    ->numeric()
                    ->nullable()
                    ->rules([
                        // (14) قاعدة مخصصة: التكلفة ≤ سعر البيع
                        function (Get $get) {
                            $price = $get('price');
                            if ($price === null) return [];
                            return ['numeric', 'max:' . $price];
                        },
                    ]),

                // (15) كود داخلي
                TextInput::make('code')
                    ->label('الكود الداخلي')
                    ->maxLength(50)
                    ->nullable(),

                // (16) تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (17) دالة table(): جدول عرض بنود الأسعار
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
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        'service'    => 'خدمة طبية',
                        default      => $state,
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
     * (18) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (19) دالة getPages(): صفحات الـ Resource
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