<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Schedule;
use App\Models\Doctor;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس ScheduleFactory
class ScheduleFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Schedule
    protected $model = Schedule::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية لجداول الأطباء
     */
    public function definition(): array
    {
        // (6) قائمة أوقات البدء المحتملة (صباحية ومسائية)
        $startTimes = ['08:00', '09:00', '10:00', '14:00', '16:00'];

        // (7) اختيار وقت بدء عشوائي
        $startTime = fake()->randomElement($startTimes);

        // (8) حساب وقت الانتهاء: وقت البدء + عدد ساعات عشوائي (4 إلى 8 ساعات)
        $hoursToAdd = fake()->numberBetween(4, 8);
        $endTime = date('H:i', strtotime($startTime . " +{$hoursToAdd} hours"));

        return [
            // (9) doctor_id: اختيار طبيب عشوائي من الموجودين
            'doctor_id' => Doctor::inRandomOrder()->first()->id,

            // (10) room_id: اختيار غرفة عشوائية (أو null)
            'room_id' => fake()->boolean(80) ? Room::inRandomOrder()->first()->id : null,

            // (11) day_of_week: يوم عشوائي (0=أحد إلى 6=سبت)
            'day_of_week' => fake()->numberBetween(0, 6),

            // (12) start_time: وقت البدء
            'start_time' => $startTime,

            // (13) end_time: وقت الانتهاء المحسوب
            'end_time' => $endTime,

            // (14) slot_duration: مدة الكشف (15، 20، أو 30 دقيقة)
            'slot_duration' => fake()->randomElement([15, 20, 30]),

            // (15) max_patients: حد أقصى للمرضى (اختياري)
            'max_patients' => fake()->boolean(50) ? fake()->numberBetween(10, 40) : null,

            // (16) is_active: 90% من الجداول مفعّلة
            'is_active' => fake()->boolean(90),
        ];
    }
}