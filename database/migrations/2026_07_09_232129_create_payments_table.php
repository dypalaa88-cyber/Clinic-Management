<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // (1) patient_id: المريض
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

            // (2) appointment_id: الموعد المرتبط (اختياري)
            $table->foreignId('appointment_id')->nullable()->constrained()->nullOnDelete();

            // (3) contract_id: العقد المستخدم
            $table->foreignId('contract_id')->nullable()->constrained()->nullOnDelete();

            // (4) total_amount: المبلغ الإجمالي
            $table->decimal('total_amount', 10, 2);

            // (5) paid_amount: المبلغ المدفوع
            $table->decimal('paid_amount', 10, 2);

            // (6) remaining_amount: المبلغ المتبقي
            $table->decimal('remaining_amount', 10, 2)->default(0);

            // (7) payment_method: طريقة الدفع (نقدي، بطاقة، تأمين، تعاقد)
            $table->string('payment_method', 50)->default('cash');

            // (8) status: حالة الدفع
            $table->enum('status', ['pending', 'paid', 'partial'])->default('pending');

            // (9) notes: ملاحظات
            $table->text('notes')->nullable();

            // (10) received_by: المستخدم الذي استلم الدفع
            $table->foreignId('received_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};