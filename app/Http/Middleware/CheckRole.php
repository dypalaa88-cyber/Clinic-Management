<?php

// (1) تحديد المسار التنظيمي للملف داخل مجلد Middleware طبقاً لمعيار PSR-4
namespace App\Http\Middleware;

// (2) استيراد واجهة Closure لدعم دوال الوسيط
use Closure;

// (3) استيراد واجهة Request لقراءة الطلب القادم من المستخدم
use Illuminate\Http\Request;

// (4) استيراد Response لعرض صفحة الخطأ 403 عند رفض الصلاحية
use Symfony\Component\HttpFoundation\Response;

// (5) تعريف كلاس CheckRole المسؤول عن فحص دور المستخدم
class CheckRole
{
    /**
     * (6) دالة handle(): نقطة دخول الـ Middleware
     *     تُنفَّذ تلقائياً على كل طلب يمر عبر هذا الوسيط
     *
     * @param  Request  $request  الطلب القادم من المتصفح
     * @param  Closure  $next     الدالة التي تمرر الطلب للطبقة التالية
     * @param  string  $role      الدور المطلوب (admin, doctor, receptionist)
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // (7) التحقق من أن المستخدم مسجل دخوله أولاً
        if (!auth()->check()) {
            // (8) إذا لم يكن مسجلاً، توجيهه إلى صفحة تسجيل الدخول
            return redirect()->route('filament.admin.auth.login');
        }

        // (9) قراءة دور المستخدم من حقل role في قاعدة البيانات
        $userRole = auth()->user()->role;

        // (10) فحص ما إذا كان دور المستخدم يطابق الدور المطلوب
        if ($userRole === $role) {
            // (11) الدور متطابق: السماح بمرور الطلب إلى الطبقة التالية
            return $next($request);
        }

        // (12) الدور غير متطابق: عرض صفحة خطأ 403 (ممنوع)
        //      abort(403) يوقف الطلب ويعرض رسالة "غير مصرح لك"
        abort(403, 'غير مصرح لك بالدخول إلى هذه الصفحة.');
    }
}