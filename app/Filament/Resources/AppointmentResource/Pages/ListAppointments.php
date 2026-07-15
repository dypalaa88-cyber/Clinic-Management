<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            // (1) زر تقرير المواعيد
            Actions\Action::make('appointment_report')
                ->label('تقرير المواعيد')
                ->icon('heroicon-o-document-text')
                ->color('gray')
                ->url(route('appointment.report'))
                ->openUrlInNewTab(),
        ];
    }
}