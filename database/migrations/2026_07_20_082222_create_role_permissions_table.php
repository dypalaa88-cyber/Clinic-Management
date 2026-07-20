<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول role_permissions
     */
    public function up(): void
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) role: اسم الدور (admin, doctor, receptionist)
            $table->string('role', 50);

            // (6) resource: اسم الشاشة (PatientResource, AppointmentResource, ...)
            $table->string('resource', 100);

            // (7) can_view: هل يسمح له بمشاهدة هذه الشاشة؟
            $table->boolean('can_view')->default(true);

            // (8) can_create: هل يسمح له بإنشاء سجلات جديدة؟
            $table->boolean('can_create')->default(true);

            // (9) can_edit: هل يسمح له بتعديل السجلات؟
            $table->boolean('can_edit')->default(true);

            // (10) can_delete: هل يسمح له بحذف السجلات؟
            $table->boolean('can_delete')->default(true);

            // (11) timestamps: created_at و updated_at
            $table->timestamps();

            // (12) فهرس فريد: لا يمكن تكرار نفس الصلاحية لنفس الدور
            $table->unique(['role', 'resource']);
        });
    }

    /**
     * (13) دالة down(): حذف جدول role_permissions
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permissions');
    }
};