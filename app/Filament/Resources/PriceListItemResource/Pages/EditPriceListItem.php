<?php

namespace App\Filament\Resources\PriceListItemResource\Pages;

use App\Filament\Resources\PriceListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceListItem extends EditRecord
{
    protected static string $resource = PriceListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
