<?php

namespace App\Filament\Resources;

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

class PriceListResource extends Resource
{
    protected static ?string $model = PriceList::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'لوائح الأسعار';
    protected static ?string $modelLabel = 'لائحة أسعار';
    protected static ?string $pluralModelLabel = 'لوائح الأسعار';

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),
                TextColumn::make('name')->label('اسم اللائحة')->searchable()->sortable(),
                TextColumn::make('items_count')->label('عدد البنود')->counts('items')->sortable(),
                IconColumn::make('is_active')->label('مفعّلة')->boolean(),
                TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime('Y-m-d')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    // (1) تسجيل Relation Manager
    public static function getRelations(): array
    {
        return [
            SpecialtiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPriceLists::route('/'),
            'create' => Pages\CreatePriceList::route('/create'),
            'edit'   => Pages\EditPriceList::route('/{record}/edit'),
        ];
    }
}