<?php

// (1) استيراد الكلاسات الهندسية اللازمة
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء الجدول الوسيط doctor_specialty
     */
    public function up(): void
    {
        Schema::create('doctor_specialty', function (Blueprint $table) {

            // (4) doctor_id: مفتاح خارجي يشير إلى جدول doctors
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();

            // (5) specialty_id: مفتاح خارجي يشير إلى جدول specialties
            $table->foreignId('specialty_id')->constrained()->cascadeOnDelete();

            // (6) المفتاح الأساسي مركب من العمودين (يمنع تكرار نفس العلاقة)
            $table->primary(['doctor_id', 'specialty_id']);

            // (7) timestamps: وقت إنشاء وتحديث العلاقة
            $table->timestamps();
        });
    }

    /**
     * (8) دالة down(): حذف الجدول الوسيط
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_specialty');
    }
};