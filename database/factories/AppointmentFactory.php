<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس AppointmentFactory
class AppointmentFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Appointment
    protected $model = Appointment::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية للمواعيد
     */
    public function definition(): array
    {
        // (6) اختيار طبيب عشوائي
        $doctor = Doctor::inRandomOrder()->first();

        // (7) تاريخ عشوائي في الأسبوع القادم
        $appointmentDate = fake()->dateTimeBetween('now', '+7 days')->format('Y-m-d');

        // (8) وقت عشوائي بين 9 صباحاً و 5 مساءً
        $hour = fake()->numberBetween(9, 17);
        $minute = fake()->randomElement([0, 15, 30, 45]);
        $appointmentTime = sprintf('%02d:%02d', $hour, $minute);

        // (9) مدة الكشف الافتراضية (سنأخذها من جدول الطبيب إن وجد)
        $slotDuration = 15;

        // (10) وقت الانتهاء = وقت البداية + مدة الكشف
        $endTime = date('H:i', strtotime($appointmentTime . " +{$slotDuration} minutes"));

        // (11) الحالة: عشوائية
        $status = fake()->randomElement(['pending', 'confirmed', 'completed', 'cancelled', 'no_show']);

        return [
            // (12) patient_id: مريض عشوائي
            'patient_id' => Patient::inRandomOrder()->first()->id,

            // (13) doctor_id: الطبيب المختار
            'doctor_id' => $doctor->id,

            // (14) room_id: غرفة عشوائية (70% احتمال)
            'room_id' => fake()->boolean(70) ? Room::inRandomOrder()->first()->id : null,

            // (15) schedule_id: null حالياً
            'schedule_id' => null,

            // (16) appointment_date: التاريخ المختار
            'appointment_date' => $appointmentDate,

            // (17) appointment_time: الوقت المختار
            'appointment_time' => $appointmentTime,

            // (18) end_time: وقت الانتهاء
            'end_time' => $endTime,

            // (19) type: 80% محجوز مسبقاً، 20% حضور مباشر
            'type' => fake()->randomElement(['scheduled', 'scheduled', 'scheduled', 'scheduled', 'walk_in']),

            // (20) status: الحالة
            'status' => $status,

            // (21) queue_number: رقم الدور (للحضور المباشر فقط)
            'queue_number' => function ($attributes) {
                return $attributes['type'] === 'walk_in'
                    ? fake()->numberBetween(1, 20)
                    : null;
            },

            // (22) notes: ملاحظات (30% احتمال)
            'notes' => fake()->boolean(30) ? fake()->sentence() : null,

            // (23) created_by: موظف الاستقبال Admin
            'created_by' => User::where('role', 'admin')->first()?->id,
        ];
    }
}