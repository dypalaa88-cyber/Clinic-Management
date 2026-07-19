<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): تحويل category من string إلى json
     */
    public function up(): void
    {
        Schema::table('contract_copay_tiers', function (Blueprint $table) {
            // (4) حذف العمود القديم
            $table->dropColumn('category');
        });

        Schema::table('contract_copay_tiers', function (Blueprint $table) {
            // (5) إضافة العمود الجديد كنوع json
            $table->json('category')->nullable()->after('contract_id');
        });
    }

    /**
     * (6) دالة down(): إعادة category إلى string
     */
    public function down(): void
    {
        Schema::table('contract_copay_tiers', function (Blueprint $table) {
            $table->dropColumn('category');
        });

        Schema::table('contract_copay_tiers', function (Blueprint $table) {
            $table->string('category', 50)->nullable()->after('contract_id');
        });
    }
};