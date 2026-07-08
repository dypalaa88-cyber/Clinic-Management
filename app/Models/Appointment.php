<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// (3) تعريف كلاس Appointment
class Appointment extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'room_id',
        'schedule_id',
        'appointment_date',
        'appointment_time',
        'end_time',
        'type',
        'status',
        'queue_number',
        'notes',
        'created_by',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
            'appointment_time' => 'datetime:H:i',
            'end_time'         => 'datetime:H:i',
            'queue_number'     => 'integer',
        ];
    }

    /**
     * (7) patient(): الموعد ينتمي إلى مريض واحد
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * (8) doctor(): الموعد ينتمي إلى طبيب واحد
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * (9) room(): الموعد في غرفة واحدة
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * (10) schedule(): الموعد مرتبط بجدول طبيب واحد
     */
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    /**
     * (11) creator(): من أنشأ الموعد (موظف الاستقبال)
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}