<?php

namespace App\Filament\Resources\SpecialtyResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class PriceListItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'priceListItems';

    protected static ?string $title = 'خدمات التخصص';

    protected static ?string $modelLabel = 'خدمة';

    protected static ?string $pluralModelLabel = 'خدمات التخصص';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('price_list_id')
                    ->label('اللائحة')
                    ->relationship('priceList', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name')
                    ->label('اسم الخدمة')
                    ->required()
                    ->maxLength(200),

                Select::make('category')
                    ->label('التصنيف')
                    ->options([
                        'service'    => 'خدمة طبية',
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                    ])
                    ->default('service')
                    ->required(),

                TextInput::make('price')
                    ->label('السعر (جنيه)')
                    ->numeric()
                    ->required(),

                TextInput::make('cost')
                    ->label('التكلفة (جنيه)')
                    ->numeric()
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('priceList.name')
                    ->label('اللائحة'),

                TextColumn::make('name')
                    ->label('اسم الخدمة')
                    ->searchable(),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'service'    => 'خدمة طبية',
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        default      => $state,
                    })
                    ->badge(),

                TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            // (1) أزرار الإضافة والتعديل والحذف
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}