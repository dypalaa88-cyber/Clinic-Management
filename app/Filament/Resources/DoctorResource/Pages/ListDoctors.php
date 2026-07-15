<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoctors extends ListRecords
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            // (1) زر تقرير الأطباء
            Actions\Action::make('doctor_report')
                ->label('تقرير الأطباء')
                ->icon('heroicon-o-document-text')
                ->color('gray')
                ->url(route('doctor.report'))
                ->openUrlInNewTab(),
        ];
    }
}