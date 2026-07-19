<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers\CopayTiersRelationManager;
use App\Models\Contract;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس ContractResource
class ContractResource extends Resource
{
    // (4) ربط الـ Resource بموديل Contract
    protected static ?string $model = Contract::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'العقود';
    protected static ?string $modelLabel = 'عقد';
    protected static ?string $pluralModelLabel = 'العقود';

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'التسعير والعقود';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل عقد
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم العقد')
                    ->required()
                    ->maxLength(100),

                TextInput::make('organization_name')
                    ->label('اسم الجهة')
                    ->required()
                    ->maxLength(100),

                Select::make('contract_type')
                    ->label('نوع العقد')
                    ->options([
                        'cash'      => 'نقدي',
                        'corporate' => 'تعاقد شركات',
                    ])
                    ->required(),

                Select::make('price_list_id')
                    ->label('لائحة الأسعار')
                    ->relationship('priceList', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('start_date')
                    ->label('تاريخ البداية')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('تاريخ النهاية')
                    ->required()
                    ->after('start_date'),

                TextInput::make('copay_percentage')
                    ->label('نسبة تحمل المريض (%) — عامة')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->suffix('%')
                    ->helperText('تُستخدم إذا لم توجد شرائح تحمل محددة'),

                TextInput::make('discount_percentage')
                    ->label('نسبة الخصم (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->suffix('%'),

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (9) دالة table(): جدول عرض العقود
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم العقد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('organization_name')
                    ->label('الجهة')
                    ->searchable(),

                TextColumn::make('contract_type')
                    ->label('النوع')
                    ->formatStateUsing(function ($state) {
                        return $state === 'cash' ? 'نقدي' : 'تعاقد';
                    })
                    ->badge()
                    ->color(function ($state) {
                        return $state === 'cash' ? 'success' : 'info';
                    }),

                TextColumn::make('priceList.name')
                    ->label('اللائحة'),

                TextColumn::make('start_date')
                    ->label('تاريخ البداية')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('تاريخ النهاية')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('copay_percentage')
                    ->label('تحمل المريض')
                    ->formatStateUsing(function ($state) {
                        return $state . '%';
                    }),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('contract_type')
                    ->label('النوع')
                    ->options([
                        'cash'      => 'نقدي',
                        'corporate' => 'تعاقد',
                    ]),

                SelectFilter::make('is_active')
                    ->label('الحالة')
                    ->options([
                        true  => 'مفعّل',
                        false => 'غير مفعّل',
                    ]),
            ]);
    }

    /**
     * (10) دالة getRelations(): Relation Managers
     */
    public static function getRelations(): array
    {
        return [
            CopayTiersRelationManager::class,
        ];
    }

    /**
     * (11) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit'   => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}