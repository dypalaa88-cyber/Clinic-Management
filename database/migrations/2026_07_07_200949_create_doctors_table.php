<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول doctors
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) first_name: الاسم الأول للطبيب - مطلوب
            $table->string('first_name', 100);

            // (6) last_name: الاسم الأخير للطبيب - مطلوب
            $table->string('last_name', 100);

            // (7) phone: رقم هاتف الطبيب - اختياري
            $table->string('phone', 20)->nullable();

            // (8) email: بريد إلكتروني - فريد
            $table->string('email', 100)->unique();

            // (9) license_number: رقم الترخيص الطبي - فريد
            $table->string('license_number', 50)->unique();

            // (10) years_of_experience: عدد سنوات الخبرة
            $table->unsignedTinyInteger('years_of_experience')->default(0);

            // (11) consultation_fee: رسم الكشف
            $table->decimal('consultation_fee', 10, 2)->default(0);

            // (12) is_active: هل الطبيب مفعّل؟
            $table->boolean('is_active')->default(true);

            // (13) user_id: ربط الطبيب بجدول users (للدخول للوحة التحكم)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // (14) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (15) دالة down(): حذف جدول doctors
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};