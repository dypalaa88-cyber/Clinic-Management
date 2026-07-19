<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول contract_copay_tiers
     */
    public function up(): void
    {
        Schema::create('contract_copay_tiers', function (Blueprint $table) {
            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) contract_id: العقد المرتبط
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();

            // (6) category: تصنيف الخدمة — null يعني "كل التصنيفات"
            $table->string('category', 50)->nullable();

            // (7) tier_name: اسم الفئة (اختياري — مثل "فئة المديرين")
            $table->string('tier_name', 100)->nullable();

            // (8) percentage: نسبة التحمل
            $table->unsignedTinyInteger('percentage')->default(0);

            // (9) is_active: هل هذه النسبة مفعّلة؟
            $table->boolean('is_active')->default(true);

            // (10) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (11) دالة down(): حذف جدول contract_copay_tiers
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_copay_tiers');
    }
};