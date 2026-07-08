<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول appointments
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) patient_id: المريض (مطلوب)
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

            // (6) doctor_id: الطبيب (مطلوب)
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();

            // (7) room_id: الغرفة (اختياري — يمكن تحديدها لاحقاً)
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();

            // (8) schedule_id: جدول الطبيب المرتبط بهذا الموعد (اختياري)
            $table->foreignId('schedule_id')->nullable()->constrained()->nullOnDelete();

            // (9) appointment_date: تاريخ الموعد (YYYY-MM-DD)
            $table->date('appointment_date');

            // (10) appointment_time: وقت الموعد (HH:MM)
            $table->time('appointment_time');

            // (11) end_time: وقت انتهاء الموعد (بداية + مدة الكشف)
            $table->time('end_time');

            // (12) type: نوع الموعد — scheduled (محجوز) أو walk_in (حضور مباشر)
            $table->enum('type', ['scheduled', 'walk_in'])->default('scheduled');

            // (13) status: حالة الموعد
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled', 'no_show'])
                ->default('pending');

            // (14) queue_number: رقم الدور (للمواعيد الحضور المباشر)
            $table->unsignedTinyInteger('queue_number')->nullable();

            // (15) notes: ملاحظات إضافية
            $table->text('notes')->nullable();

            // (16) created_by: المستخدم الذي أنشأ الموعد (موظف الاستقبال)
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            // (17) timestamps: created_at و updated_at
            $table->timestamps();

            // (18) فهارس لتحسين أداء البحث
            $table->index('appointment_date');
            $table->index('status');
            $table->index('type');
        });
    }

    /**
     * (19) دالة down(): حذف جدول appointments
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};