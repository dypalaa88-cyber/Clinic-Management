<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Patient;

// (3) تعريف كلاس PatientSeeder
class PatientSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 200 مريض وهمي
     */
    public function run(): void
    {
        Patient::factory(200)->create();
    }
}