<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\InventoryItemResource\Pages;
use App\Models\InventoryItem;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس InventoryItemResource
class InventoryItemResource extends Resource
{
    // (4) ربط الـ Resource بموديل InventoryItem
    protected static ?string $model = InventoryItem::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'المخازن والصيدلية';
    protected static ?string $modelLabel = 'صنف';
    protected static ?string $pluralModelLabel = 'المخازن والصيدلية';

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'المخازن والصيدلية';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل صنف
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (9) name: اسم الصنف
                TextInput::make('name')
                    ->label('اسم الصنف')
                    ->required()
                    ->maxLength(200),

                // (10) category: تصنيف الصنف
                Select::make('category')
                    ->label('التصنيف')
                    ->options([
                        'medicine' => 'دواء',
                        'supply'   => 'مستلزم',
                    ])
                    ->required(),

                // (11) code: كود داخلي
                TextInput::make('code')
                    ->label('الكود الداخلي')
                    ->maxLength(50)
                    ->nullable(),

                // (12) unit: وحدة القياس
                TextInput::make('unit')
                    ->label('وحدة القياس')
                    ->default('piece')
                    ->required()
                    ->maxLength(50),

                // (13) purchase_price: سعر الشراء
                TextInput::make('purchase_price')
                    ->label('سعر الشراء (جنيه)')
                    ->numeric()
                    ->nullable(),

                // (14) selling_price: سعر البيع
                TextInput::make('selling_price')
                    ->label('سعر البيع (جنيه)')
                    ->numeric()
                    ->required(),

                // (15) quantity: الكمية
                TextInput::make('quantity')
                    ->label('الكمية المتاحة')
                    ->numeric()
                    ->default(0)
                    ->required(),

                // (16) min_quantity: الحد الأدنى
                TextInput::make('min_quantity')
                    ->label('الحد الأدنى للتنبيه')
                    ->numeric()
                    ->default(5)
                    ->required(),

                // (17) expiry_date: تاريخ الصلاحية
                DatePicker::make('expiry_date')
                    ->label('تاريخ انتهاء الصلاحية')
                    ->nullable(),

                // (18) batch_number: رقم التشغيلة
                TextInput::make('batch_number')
                    ->label('رقم التشغيلة')
                    ->maxLength(100)
                    ->nullable(),

                // (19) is_active: تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (20) دالة table(): جدول عرض المخزون
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم الصنف')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->formatStateUsing(function ($state) {
                        return $state === 'medicine' ? '💊 دواء' : '📦 مستلزم';
                    })
                    ->badge()
                    ->color(function ($state) {
                        return $state === 'medicine' ? 'info' : 'warning';
                    }),

                TextColumn::make('code')
                    ->label('الكود')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('quantity')
                    ->label('الكمية')
                    ->sortable()
                    ->color(function ($state, $record) {
                        if ($state <= 0) {
                            return 'danger';
                        }

                        return $state <= $record->min_quantity ? 'warning' : 'success';
                    }),

                TextColumn::make('selling_price')
                    ->label('سعر البيع')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('expiry_date')
                    ->label('تاريخ الصلاحية')
                    ->date('Y-m-d')
                    ->sortable()
                    ->color(function ($state) {
                        if (!$state) {
                            return null;
                        }

                        return now()->diffInDays($state, false) < 30 ? 'danger' : null;
                    }),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'medicine' => 'دواء',
                        'supply'   => 'مستلزم',
                    ]),
            ]);
    }

    /**
     * (21) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (22) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListInventoryItems::route('/'),
            'create' => Pages\CreateInventoryItem::route('/create'),
            'edit'   => Pages\EditInventoryItem::route('/{record}/edit'),
        ];
    }
}