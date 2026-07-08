<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس RoomFactory
class RoomFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Room
    protected $model = Room::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية للغرف
     */
    public function definition(): array
    {
        return [
            // (6) name: اسم الغرفة (غرفة + رقم عشوائي)
            'name' => 'غرفة ' . fake()->numberBetween(100, 500),

            // (7) floor: الطابق (دور + رقم)
            'floor' => 'الدور ' . fake()->randomElement(['الأول', 'الثاني', 'الثالث', 'الرابع']),

            // (8) building: المبنى
            'building' => 'مبنى ' . fake()->randomElement(['أ', 'ب', 'ج']),

            // (9) type: نوع الغرفة
            'type' => fake()->randomElement(['examination', 'examination', 'examination', 'procedure', 'emergency']),

            // (10) is_active: 90% من الغرف مفعّلة
            'is_active' => fake()->boolean(90),

            // (11) notes: ملاحظات عشوائية (50% احتمال)
            'notes' => fake()->boolean(50) ? fake()->sentence() : null,
        ];
    }
}