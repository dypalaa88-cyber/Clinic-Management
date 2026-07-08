<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل الهجرة: إضافة عمود locale إلى جدول users
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // إنشاء عمود locale: نصي بطول حرفين، قيمته الافتراضية 'ar' (العربية)
            $table->string('locale', 2)->default('ar')->after('password');
        });
    }

    /**
     * التراجع عن الهجرة: حذف عمود locale من جدول users
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('locale');
        });
    }
};