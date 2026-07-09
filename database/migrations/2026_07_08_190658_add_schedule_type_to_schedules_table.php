<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إضافة أعمدة جديدة لجدول schedules
     *     schedule_type: نوع الجدول (دوري أو استثنائي)
     *     override_date: تاريخ الجدول الاستثنائي (للمرات الواحدة)
     *     recurring_days: أيام الأسبوع للجدول الدوري (مخزنة كـ JSON)
     *     start_date / end_date: نطاق تواريخ الجدول الدوري (اختياري)
     */
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            
            // (4) schedule_type: دوري (recurring) أو استثنائي (override)
            //     default: 'recurring' — معظم الجداول دورية
            $table->string('schedule_type', 20)->default('recurring')->after('id');
            
            // (5) override_date: تاريخ محدد للجدول الاستثنائي (YYYY-MM-DD)
            //     nullable: الجداول الدورية لا تحتاج هذا الحقل
            $table->date('override_date')->nullable()->after('schedule_type');
            
            // (6) recurring_days: مصفوفة أيام الأسبوع للجدول الدوري
            //     مثال: [0,2,4] = أحد وثلاثاء وخميس
            //     nullable: الجداول الاستثنائية لا تحتاج هذا الحقل
            $table->json('recurring_days')->nullable()->after('override_date');
            
            // (7) start_date: تاريخ بدء سريان الجدول الدوري
            //     nullable: إذا لم يحدد، يبدأ من الآن
            $table->date('start_date')->nullable()->after('recurring_days');
            
            // (8) end_date: تاريخ انتهاء سريان الجدول الدوري
            //     nullable: إذا لم يحدد، يستمر للأبد
            $table->date('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * (9) دالة down(): حذف الأعمدة المضافة عند التراجع
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn([
                'schedule_type',
                'override_date',
                'recurring_days',
                'start_date',
                'end_date',
            ]);
        });
    }
};