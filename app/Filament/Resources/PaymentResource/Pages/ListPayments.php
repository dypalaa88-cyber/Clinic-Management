<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // (1) زر تقرير الفواتير
            Actions\Action::make('payment_report')
                ->label('تقرير الفواتير')
                ->icon('heroicon-o-document-text')
                ->color('gray')
                ->url(route('payment.report'))
                ->openUrlInNewTab(),
        ];
    }
}