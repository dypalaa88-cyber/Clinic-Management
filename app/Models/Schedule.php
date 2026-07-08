<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// (3) تعريف كلاس Schedule
class Schedule extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'doctor_id',
        'room_id',
        'day_of_week',
        'start_time',
        'end_time',
        'slot_duration',
        'max_patients',
        'is_active',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'is_active'      => 'boolean',
            'day_of_week'    => 'integer',
            'slot_duration'  => 'integer',
            'max_patients'   => 'integer',
            'start_time'     => 'datetime:H:i',
            'end_time'       => 'datetime:H:i',
        ];
    }

    /**
     * (7) doctor(): علاقة BelongsTo مع الطبيب
     *     كل جدول ينتمي إلى طبيب واحد
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * (8) room(): علاقة BelongsTo مع الغرفة
     *     كل جدول قد يرتبط بغرفة (اختياري)
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}