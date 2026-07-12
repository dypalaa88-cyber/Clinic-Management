<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // (1) contract_id: العقد المرتبط بالمريض (اختياري)
            $table->foreignId('contract_id')->nullable()->after('national_id')->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
            $table->dropColumn('contract_id');
        });
    }
};