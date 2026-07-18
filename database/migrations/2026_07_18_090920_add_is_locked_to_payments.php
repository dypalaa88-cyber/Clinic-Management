<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // (1) is_locked: هل الفاتورة مغلقة (للقراءة فقط)؟
            $table->boolean('is_locked')->default(false)->after('status');

            // (2) locked_by: من قام بالغلق
            $table->foreignId('locked_by')->nullable()->after('is_locked')->constrained('users')->nullOnDelete();

            // (3) locked_at: متى تم الغلق
            $table->timestamp('locked_at')->nullable()->after('locked_by');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['locked_by']);
            $table->dropColumn(['is_locked', 'locked_by', 'locked_at']);
        });
    }
};