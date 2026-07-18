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
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;

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
                    ->label('سعر البيع (جنيه)')
                    ->numeric()
                    ->required()
                    ->reactive(),

                TextInput::make('cost')
                    ->label('سعر التكلفة (جنيه)')
                    ->numeric()
                    ->nullable()
                    ->rules([
                        function (Get $get) {
                            $price = $get('price');
                            if ($price === null) return [];
                            return ['numeric', 'max:' . $price];
                        },
                    ]),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // (1) عرض الخدمات الفريدة فقط (بدون تكرار)
            ->modifyQueryUsing(fn (Builder $query) => $query->whereIn('id', function ($sub) {
                $sub->selectRaw('MIN(id)')
                    ->from('price_list_items')
                    ->where('specialty_id', $this->getOwnerRecord()->id)
                    ->groupBy('name');
            }))
            ->columns([
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
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}