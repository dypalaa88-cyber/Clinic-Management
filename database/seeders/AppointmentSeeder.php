<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Appointment;

// (3) تعريف كلاس AppointmentSeeder
class AppointmentSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 500 موعد وهمي
     */
    public function run(): void
    {
        Appointment::factory(500)->create();
    }
}