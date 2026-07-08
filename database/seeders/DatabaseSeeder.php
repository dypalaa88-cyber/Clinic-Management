<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاس الأساسي
use Illuminate\Database\Seeder;

// (3) تعريف كلاس DatabaseSeeder
class DatabaseSeeder extends Seeder
{
    /**
     * (4) دالة run(): استدعاء الـ Seeders بالترتيب الصحيح
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,        // أولاً: المستخدمين
            SpecialtySeeder::class,   // ثانياً: التخصصات
            RoomSeeder::class,        // ثالثاً: الغرف
            DoctorSeeder::class,      // رابعاً: الأطباء (تحتاج تخصصات)
            PatientSeeder::class,     // خامساً: المرضى
            ScheduleSeeder::class,    // سادساً: جداول الأطباء
            AppointmentSeeder::class, // سابعاً: المواعيد (تحتاج الكل)
        ]);
    }
}