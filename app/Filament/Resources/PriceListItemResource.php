<?php

namespace App\Filament\Resources;

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

class PriceListItemResource extends Resource
{
    protected static ?string $model = PriceListItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationLabel = 'بنود الأسعار';
    protected static ?string $modelLabel = 'بند سعر';
    protected static ?string $pluralModelLabel = 'بنود الأسعار';

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

                // (1) حقل التخصص — جديد
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
                    ->required(),

                TextInput::make('cost')
                    ->label('سعر التكلفة (جنيه)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('code')
                    ->label('الكود الداخلي')
                    ->maxLength(50)
                    ->nullable(),

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

                TextColumn::make('priceList.name')
                    ->label('اللائحة')
                    ->searchable()
                    ->sortable(),

                // (2) عمود التخصص — جديد
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

                // (3) فلتر بالتخصص — جديد
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPriceListItems::route('/'),
            'create' => Pages\CreatePriceListItem::route('/create'),
            'edit'   => Pages\EditPriceListItem::route('/{record}/edit'),
        ];
    }
}