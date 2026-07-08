<?php

// (1) تحديد المسار التنظيمي للملف داخل مجلد Middleware طبقاً لمعيار PSR-4
namespace App\Http\Middleware;

// (2) استيراد واجهة Closure لدعم دوال الوسيط (Middleware)
use Closure;

// (3) استيراد واجهة Request لقراءة الطلب القادم من المستخدم
use Illuminate\Http\Request;

// (4) استيراد فاساد App لتغيير اللغة على مستوى التطبيق بالكامل
use Illuminate\Support\Facades\App;

// (5) تعريف كلاس SetUserLocale المسؤول عن ضبط لغة التطبيق لكل مستخدم
class SetUserLocale
{
    /**
     * (6) دالة handle(): نقطة دخول الـ Middleware
     *     تُنفَّذ تلقائياً على كل طلب يمر عبر هذا الوسيط
     *
     * @param  Request  $request  الطلب القادم من المتصفح
     * @param  Closure  $next     الدالة التي تمرر الطلب للطبقة التالية
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // (7) التحقق من أن المستخدم مسجل دخوله
        //     auth()->user() ترجع null إذا لم يكن مسجلاً
        if (auth()->check()) {

            // (8) قراءة حقل locale من المستخدم المسجل
            //     القيمة ستكون 'ar' أو 'en' (الافتراضي 'ar' كما عرفناه في قاعدة البيانات)
            $locale = auth()->user()->locale;

            // (9) App::setLocale(): تغيير لغة التطبيق بالكامل إلى لغة المستخدم
            //     Laravel سيستخدم ملفات الترجمة من lang/{locale} تلقائياً
            //     إذا كانت 'ar': يستخدم lang/ar/
            //     إذا كانت 'en': يستخدم lang/en/
            App::setLocale($locale);
        }

        // (10) تمرير الطلب إلى الطبقة التالية من Middleware أو إلى التطبيق نفسه
        //     هذا إلزامي: بدونه يتوقف الطلب ولا يكمل
        return $next($request);
    }
}