<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources\PatientResource\Pages;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\PatientResource;
use App\Filament\Actions\BookAppointmentAction;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

// (3) تعريف كلاس EditPatient
class EditPatient extends EditRecord
{
    // (4) ربط الصفحة بـ PatientResource
    protected static string $resource = PatientResource::class;

    /**
     * (5) دالة getHeaderActions(): الأزرار التي تظهر في أعلى صفحة تعديل المريض
     */
    protected function getHeaderActions(): array
    {
        return [
            // (6) زر حذف المريض (موجود افتراضياً)
            Actions\DeleteAction::make(),

            // (7) زر حجز موعد (الجديد) — يفتح Modal لإنشاء موعد لهذا المريض
            BookAppointmentAction::make($this->getRecord()),
        ];
    }
}