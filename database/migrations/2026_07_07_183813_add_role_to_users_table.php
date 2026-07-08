<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل الهجرة: إضافة عمود role إلى جدول users
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // إنشاء عمود role: enum (قائمة محددة) بـ 3 أدوار فقط، القيمة الافتراضية 'receptionist'
            $table->enum('role', ['admin', 'doctor', 'receptionist'])->default('receptionist')->after('locale');
        });
    }

    /**
     * التراجع عن الهجرة: حذف عمود role من جدول users
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};