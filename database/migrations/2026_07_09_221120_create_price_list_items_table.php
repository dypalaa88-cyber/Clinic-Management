<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_list_items', function (Blueprint $table) {
            $table->id();

            // (1) price_list_id: اللائحة الأم
            $table->foreignId('price_list_id')->constrained()->cascadeOnDelete();

            // (2) name: اسم الخدمة أو الصنف
            $table->string('name', 200);

            // (3) category: تصنيف الخدمة (دواء، مستلزم، تحليل، أشعة، خدمة طبية)
            $table->enum('category', ['medicine', 'supply', 'lab', 'radiology', 'service']);

            // (4) price: سعر البيع للمريض
            $table->decimal('price', 10, 2);

            // (5) cost: سعر التكلفة على العيادة (اختياري)
            $table->decimal('cost', 10, 2)->nullable();

            // (6) code: كود داخلي للصنف (اختياري)
            $table->string('code', 50)->nullable();

            // (7) is_active: هل الصنف مفعّل؟
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_list_items');
    }
};