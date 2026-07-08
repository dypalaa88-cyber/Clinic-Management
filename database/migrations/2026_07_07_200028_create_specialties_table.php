<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول specialties
     */
    public function up(): void
    {
        Schema::create('specialties', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) name: اسم التخصص - مطلوب وفريد (باطنة، أطفال، عظام...)
            $table->string('name', 100)->unique();

            // (6) description: وصف التخصص - اختياري
            $table->text('description')->nullable();

            // (7) is_active: هل التخصص مفعّل؟ (لإخفاء التخصصات القديمة بدل حذفها)
            $table->boolean('is_active')->default(true);

            // (8) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (9) دالة down(): حذف جدول specialties
     */
    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};