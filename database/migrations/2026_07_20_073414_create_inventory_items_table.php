<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول inventory_items
     */
    public function up(): void
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) name: اسم الصنف (دواء أو مستلزم)
            $table->string('name', 200);

            // (6) category: تصنيف الصنف (medicine = دواء، supply = مستلزم)
            $table->enum('category', ['medicine', 'supply']);

            // (7) code: كود داخلي للصنف (اختياري)
            $table->string('code', 50)->nullable();

            // (8) unit: وحدة القياس (قرص، شريط، زجاجة، علبة...)
            $table->string('unit', 50)->default('piece');

            // (9) purchase_price: سعر الشراء (التكلفة على العيادة)
            $table->decimal('purchase_price', 10, 2)->nullable();

            // (10) selling_price: سعر البيع للمريض
            $table->decimal('selling_price', 10, 2);

            // (11) quantity: الكمية المتاحة في المخزون
            $table->integer('quantity')->default(0);

            // (12) min_quantity: الحد الأدنى للتنبيه
            $table->integer('min_quantity')->default(5);

            // (13) expiry_date: تاريخ انتهاء الصلاحية
            $table->date('expiry_date')->nullable();

            // (14) batch_number: رقم التشغيلة
            $table->string('batch_number', 100)->nullable();

            // (15) is_active: هل الصنف مفعّل؟
            $table->boolean('is_active')->default(true);

            // (16) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (17) دالة down(): حذف جدول inventory_items
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_items');
    }
};