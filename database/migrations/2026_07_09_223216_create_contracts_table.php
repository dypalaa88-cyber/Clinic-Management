<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // (1) name: اسم العقد (مثال: "تعاقد شركة الأمل للتأمين")
            $table->string('name', 100);

            // (2) price_list_id: اللائحة المرتبطة بالعقد
            $table->foreignId('price_list_id')->constrained()->cascadeOnDelete();

            // (3) organization_name: اسم الجهة (شركة تأمين، شركة تعاقد)
            $table->string('organization_name', 100);

            // (4) contract_type: نوع العقد
            $table->enum('contract_type', ['insurance', 'corporate'])->default('insurance');

            // (5) start_date: تاريخ بداية العقد
            $table->date('start_date');

            // (6) end_date: تاريخ نهاية العقد
            $table->date('end_date');

            // (7) copay_percentage: نسبة تحمل المريض (مثال: 10 يعني المريض يدفع 10%)
            $table->unsignedTinyInteger('copay_percentage')->default(0);

            // (8) discount_percentage: نسبة الخصم على اللائحة (اختياري)
            $table->unsignedTinyInteger('discount_percentage')->default(0);

            // (9) notes: ملاحظات
            $table->text('notes')->nullable();

            // (10) is_active: هل العقد مفعّل؟
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};