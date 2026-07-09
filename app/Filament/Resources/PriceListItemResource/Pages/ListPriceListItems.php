<?php

namespace App\Filament\Resources\PriceListItemResource\Pages;

use App\Filament\Resources\PriceListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPriceListItems extends ListRecords
{
    protected static string $resource = PriceListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
