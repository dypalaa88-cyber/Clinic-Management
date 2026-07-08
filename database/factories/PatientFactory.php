<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace Database\Factories;

// (2) استيراد الموديل المرتبط بهذا الـ Factory
use App\Models\Patient;

// (3) استيراد الكلاس الأساسي لـ Factory من Laravel
use Illuminate\Database\Eloquent\Factories\Factory;

// (4) استيراد Carbon لتوليد تواريخ عشوائية
use Illuminate\Support\Carbon;

/**
 * (5) تعريف كلاس PatientFactory المسؤول عن توليد بيانات وهمية للمرضى
 */
class PatientFactory extends Factory
{
    // (6) $model: ربط الـ Factory بموديل Patient
    protected $model = Patient::class;

    /**
     * (7) دالة definition(): تعريف الشكل الافتراضي للبيانات الوهمية
     *     Faker يُستخدم لتوليد قيم عشوائية بالعربية
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // (8) first_name: اسم أول عشوائي بالعربية (ذكر أو أنثى)
            'first_name' => fake()->firstName(),

            // (9) last_name: اسم أخير عشوائي بالعربية
            'last_name' => fake()->lastName(),

            // (10) phone: رقم هاتف مصري عشوائي (01xxxxxxxxx)
            'phone' => '01' . fake()->numberBetween(0, 2) . fake()->numberBetween(0, 5) . fake()->numerify('########'),

            // (11) date_of_birth: تاريخ ميلاد عشوائي بين 1950 و 2020
            'date_of_birth' => fake()->dateTimeBetween('-70 years', '-5 years')->format('Y-m-d'),

            // (12) gender: جنس عشوائي (ذكر أو أنثى)
            'gender' => fake()->randomElement(['male', 'female']),

            // (13) address: عنوان عشوائي بالعربية (اختياري - 70% من المرضى لهم عنوان)
            'address' => fake()->boolean(70) ? fake()->address() : null,

            // (14) medical_history: تاريخ مرضي عشوائي (اختياري - 50% لهم تاريخ مرضي)
            'medical_history' => fake()->boolean(50) ? fake()->paragraph() : null,

            // (15) national_id: رقم قومي عشوائي 14 رقم (اختياري - 80% لهم رقم قومي)
            'national_id' => fake()->boolean(80) ? fake()->numerify('##############') : null,
        ];
    }
}