<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_items', function (Blueprint $table) {
            $table->id();

            // (1) payment_id: الدفعة الأم
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();

            // (2) name: اسم الخدمة
            $table->string('name', 200);

            // (3) category: تصنيف الخدمة
            $table->string('category', 50);

            // (4) price: سعر الوحدة
            $table->decimal('price', 10, 2);

            // (5) quantity: الكمية (افتراضي 1)
            $table->unsignedTinyInteger('quantity')->default(1);

            // (6) total: الإجمالي = السعر × الكمية
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_items');
    }
};