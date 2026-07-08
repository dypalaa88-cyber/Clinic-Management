<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// (3) تعريف كلاس Doctor
class Doctor extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'license_number',
        'years_of_experience',
        'consultation_fee',
        'is_active',
        'user_id',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'is_active'            => 'boolean',
            'consultation_fee'     => 'decimal:2',
            'years_of_experience'  => 'integer',
        ];
    }

    /**
     * (7) specialties(): علاقة Many-to-Many مع التخصصات
     *     الطبيب الواحد يمكن أن يكون له عدة تخصصات
     *     والتخصص الواحد يمكن أن يكون له عدة أطباء
     */
    public function specialties(): BelongsToMany
    {
        // (8) belongsToMany: يربط Doctor بـ Specialty عبر الجدول الوسيط doctor_specialty
        return $this->belongsToMany(Specialty::class, 'doctor_specialty')
            ->withTimestamps(); // يسجل وقت إنشاء العلاقة وتحديثها
    }

    /**
     * (9) user(): علاقة BelongsTo مع جدول users
     *     كل طبيب مرتبط بحساب مستخدم واحد (للدخول للوحة التحكم)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}