<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول rooms
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) name: اسم الغرفة - مطلوب (مثال: غرفة 101، عيادة أ)
            $table->string('name', 50);

            // (6) floor: الطابق - اختياري
            $table->string('floor', 20)->nullable();

            // (7) building: المبنى - اختياري (إذا كانت العيادة كبيرة)
            $table->string('building', 50)->nullable();

            // (8) type: نوع الغرفة - كشف، عمليات، طوارئ...
            $table->string('type', 50)->default('examination');

            // (9) is_active: هل الغرفة مفعّلة؟
            $table->boolean('is_active')->default(true);

            // (10) notes: ملاحظات إضافية
            $table->text('notes')->nullable();

            // (11) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (12) دالة down(): حذف جدول rooms
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};