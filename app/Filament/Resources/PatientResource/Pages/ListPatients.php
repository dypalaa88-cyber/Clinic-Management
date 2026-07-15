<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\DatePicker;

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\Action::make('patient_report')
                ->label('تقرير المرضى')
                ->icon('heroicon-o-document-text')
                ->color('gray')
                ->form([
                    DatePicker::make('date_from')->label('من تاريخ')->default(now()->startOfMonth()),
                    DatePicker::make('date_to')->label('إلى تاريخ')->default(now()),
                ])
                ->action(function (array $data) {
                    return redirect()->to('/reports/patients?date_from='.$data['date_from'].'&date_to='.$data['date_to']);
                })
                ->modalHeading('تحديد الفترة')
                ->modalSubmitActionLabel('عرض التقرير')
                ->modalCancelActionLabel('إلغاء'),
        ];
    }
}