<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الموديل المرتبط
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس SpecialtyFactory
class SpecialtyFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Specialty
    protected $model = Specialty::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية
     */
    public function definition(): array
    {
        return [
            // (6) name: اختيار اسم تخصص عشوائي من قائمة التخصصات الطبية الشائعة
            'name' => fake()->unique()->randomElement([
                'باطنة',
                'أطفال',
                'جراحة عامة',
                'عظام',
                'نساء وتوليد',
                'قلب وأوعية دموية',
                'جلدية',
                'عيون',
                'أنف وأذن وحنجرة',
                'مسالك بولية',
                'مخ وأعصاب',
                'نفسية',
                'أشعة',
                'تخدير',
                'علاج طبيعي',
            ]),

            // (7) description: وصف عشوائي للتخصص
            'description' => fake()->sentence(),

            // (8) is_active: 90% من التخصصات مفعّلة
            'is_active' => fake()->boolean(90),
        ];
    }
}