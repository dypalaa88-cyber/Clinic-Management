<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Specialty;

// (3) تعريف كلاس SpecialtySeeder
class SpecialtySeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 15 تخصصاً وهمياً
     */
    public function run(): void
    {
        // (5) إنشاء 15 تخصصاً باستخدام Factory
        Specialty::factory(15)->create();
    }
}