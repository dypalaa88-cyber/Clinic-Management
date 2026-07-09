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
        'schedule_type',
        'override_date',
        'recurring_days',
        'start_date',
        'end_date',
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
            'is_active'       => 'boolean',
            'day_of_week'     => 'integer',
            'slot_duration'   => 'integer',
            'max_patients'    => 'integer',
            'start_time'      => 'datetime:H:i',
            'end_time'        => 'datetime:H:i',
            'recurring_days'  => 'array',         // تحويل JSON إلى مصفوفة تلقائياً
            'start_date'      => 'date',
            'end_date'        => 'date',
            'override_date'   => 'date',
        ];
    }

    /**
     * (7) doctor(): علاقة BelongsTo مع الطبيب
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * (8) room(): علاقة BelongsTo مع الغرفة
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}