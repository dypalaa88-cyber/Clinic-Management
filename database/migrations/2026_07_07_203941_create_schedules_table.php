<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول schedules
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) doctor_id: الطبيب المرتبط بهذا الجدول
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();

            // (6) room_id: الغرفة التي يعمل بها الطبيب في هذا اليوم (قد تتغير يومياً)
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();

            // (7) day_of_week: اليوم (0=أحد, 1=إثنين, ..., 6=سبت)
            $table->unsignedTinyInteger('day_of_week');

            // (8) start_time: وقت بدء العمل
            $table->time('start_time');

            // (9) end_time: وقت انتهاء العمل
            $table->time('end_time');

            // (10) slot_duration: مدة الكشف بالدقائق (15، 20، 30)
            $table->unsignedTinyInteger('slot_duration')->default(15);

            // (11) max_patients: الحد الأقصى للمرضى في هذا اليوم (اختياري)
            $table->unsignedTinyInteger('max_patients')->nullable();

            // (12) is_active: هل هذا الجدول مفعّل؟
            $table->boolean('is_active')->default(true);

            // (13) timestamps: created_at و updated_at
            $table->timestamps();

            // (14) unique: منع تكرار نفس الطبيب + اليوم (طبيب واحد له جدول واحد في اليوم)
            $table->unique(['doctor_id', 'day_of_week']);
        });
    }

    /**
     * (15) دالة down(): حذف جدول schedules
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};