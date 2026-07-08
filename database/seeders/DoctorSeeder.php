<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Specialty;

// (3) تعريف كلاس DoctorSeeder
class DoctorSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 50 طبيباً مع تخصصات
     */
    public function run(): void
    {
        // (5) جلب جميع التخصصات
        $specialties = Specialty::all();

        // (6) إنشاء 50 طبيباً
        Doctor::factory(50)->create()->each(function ($doctor) use ($specialties) {

            // (7) ربط كل طبيب بـ 1-3 تخصصات عشوائية
            $randomSpecialties = $specialties->random(rand(1, 3));
            $doctor->specialties()->attach($randomSpecialties);
        });
    }
}