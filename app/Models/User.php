<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Models;

// (2) استيراد الواجهات والعقود الأساسية من نواة Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// (3) تعريف كلاس User الذي يرث من Authenticatable (وليس Model العادي لأنه مستخدم مصادقة)
class User extends Authenticatable
{
    // (4) استخدام التريتات (Traits) لإضافة وظائف جاهزة:
    //     HasFactory: يسمح بإنشاء بيانات وهمية للاختبار
    //     Notifiable: يسمح بإرسال إشعارات للمستخدم
    use HasFactory, Notifiable;

    /**
     * (5) $fillable: الحقول المسموح تعبئتها جماعياً (Mass Assignment)
     *     هذه قائمة بيضاء للحماية من ثغرات الأمان
     */
    protected $fillable = [
        'name',        // اسم المستخدم
        'email',       // البريد الإلكتروني
        'password',    // كلمة المرور (مشفرة تلقائياً)
        'locale',      // لغة تفضيل المستخدم: ar أو en
        'role',        // دور المستخدم: admin, doctor, receptionist
    ];

    /**
     * (6) $hidden: الحقول المخفية عند تحويل الموديل إلى JSON
     *     تمنع تسرب كلمة المرور ورمز التذكر في استجابات API
     */
    protected $hidden = [
        'password',         // كلمة المرور المشفرة
        'remember_token',   // رمز تذكر الجلسة
    ];

    /**
     * (7) $casts: تحديد نوع البيانات الأصلي لكل حقل
     *     تضمن أن كلمة المرور تُشفر تلقائياً عند الحفظ
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // تحويل تاريخ التحقق إلى كائن DateTime
            'password'          => 'hashed',     // تشفير تلقائي لكلمة المرور عند الحفظ
        ];
    }
}