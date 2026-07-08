<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

// (3) تعريف كلاس Patient
class Patient extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'medical_history',
        'national_id',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'created_at'    => 'datetime',
            'updated_at'    => 'datetime',
        ];
    }

    /**
     * (7) appointments(): علاقة HasMany مع المواعيد
     *     المريض الواحد لديه مواعيد كثيرة (كل زياراته للعيادة)
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}