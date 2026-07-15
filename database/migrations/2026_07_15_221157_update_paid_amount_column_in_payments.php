<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // (1) زيادة سعة المدفوع والإجمالي والمتبقي إلى 15 رقم بدل 10
            $table->decimal('total_amount', 15, 2)->change();
            $table->decimal('paid_amount', 15, 2)->change();
            $table->decimal('remaining_amount', 15, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->decimal('total_amount', 10, 2)->change();
            $table->decimal('paid_amount', 10, 2)->change();
            $table->decimal('remaining_amount', 10, 2)->change();
        });
    }
};