<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Doctor;

// (3) تعريف كلاس ScheduleSeeder
class ScheduleSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء جداول لجميع الأطباء
     */
    public function run(): void
    {
        // (5) جلب جميع الأطباء
        $doctors = Doctor::all();

        // (6) لكل طبيب: إنشاء 4-6 أيام عمل
        foreach ($doctors as $doctor) {
            $days = fake()->randomElements([0, 1, 2, 3, 4, 5, 6], fake()->numberBetween(4, 6));

            foreach ($days as $day) {
                Schedule::factory()->create([
                    'doctor_id'   => $doctor->id,
                    'day_of_week' => $day,
                ]);
            }
        }
    }
}