
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): تُنفَّذ عند تشغيل php artisan migrate
     */
    public function up(): void
    {
        // (4) Schema::create: إنشاء جدول patients
        Schema::create('patients', function (Blueprint $table) {

            // (5) id(): مفتاح أساسي تلقائي التزايد
            $table->id();

            // (6) first_name: الاسم الأول - مطلوب
            $table->string('first_name', 100);

            // (7) last_name: الاسم الأخير - مطلوب
            $table->string('last_name', 100);

            // (8) phone: رقم الهاتف - اختياري، فريد
            $table->string('phone', 20)->nullable()->unique();

            // (9) date_of_birth: تاريخ الميلاد - مطلوب
            $table->date('date_of_birth');

            // (10) gender: الجنس - مطلوب ومحصور
            $table->enum('gender', ['male', 'female']);

            // (11) address: العنوان - اختياري، نص طويل
            $table->text('address')->nullable();

            // (12) medical_history: التاريخ المرضي - اختياري، نص طويل
            $table->text('medical_history')->nullable();

            // (13) national_id: الرقم القومي - اختياري، 14 رقم، فريد
            $table->string('national_id', 14)->nullable()->unique();

            // (14) created_at و updated_at: وقت الإنشاء والتحديث
            $table->timestamps();
        });
    }

    /**
     * (15) دالة down(): تُنفَّذ عند تشغيل php artisan migrate:rollback
     */
    public function down(): void
    {
        // (16) حذف جدول patients بالكامل
        Schema::dropIfExists('patients');
    }
};