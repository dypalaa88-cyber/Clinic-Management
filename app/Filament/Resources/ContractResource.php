<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContractResource\Pages;
use App\Models\Contract;
use App\Models\PriceList;
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

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'العقود';
    protected static ?string $modelLabel = 'عقد';
    protected static ?string $pluralModelLabel = 'العقود';

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
                        'insurance' => 'تأمين',
                        'corporate' => 'تعاقد شركة',
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
                    ->label('نسبة تحمل المريض (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->suffix('%'),

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
                    ->formatStateUsing(fn ($state) => $state === 'insurance' ? 'تأمين' : 'تعاقد')
                    ->badge()
                    ->color(fn ($state) => $state === 'insurance' ? 'info' : 'success'),

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
                    ->formatStateUsing(fn ($state) => $state . '%'),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('contract_type')
                    ->label('النوع')
                    ->options([
                        'insurance' => 'تأمين',
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit'   => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}