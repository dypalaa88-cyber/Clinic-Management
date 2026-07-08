<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس DoctorFactory
class DoctorFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Doctor
    protected $model = Doctor::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية للطبيب
     */
    public function definition(): array
    {
        return [
            // (6) first_name: اسم أول عشوائي
            'first_name' => fake()->firstName(),

            // (7) last_name: اسم أخير عشوائي
            'last_name' => fake()->lastName(),

            // (8) phone: رقم هاتف مصري عشوائي
            'phone' => '01' . fake()->numberBetween(0, 2) . fake()->numberBetween(0, 5) . fake()->numerify('########'),

            // (9) email: بريد إلكتروني فريد
            'email' => fake()->unique()->safeEmail(),

            // (10) license_number: رقم ترخيص عشوائي (حروف + أرقام)
            'license_number' => 'LIC-' . fake()->unique()->numerify('######'),

            // (11) years_of_experience: سنوات خبرة بين 1 و 35
            'years_of_experience' => fake()->numberBetween(1, 35),

            // (12) consultation_fee: رسم كشف بين 100 و 500 جنيه
            'consultation_fee' => fake()->randomFloat(2, 100, 500),

            // (13) is_active: 90% من الأطباء مفعّلين
            'is_active' => fake()->boolean(90),

            // (14) user_id: null حالياً (سنربطهم بحسابات لاحقاً)
            'user_id' => null,
        ];
    }
}