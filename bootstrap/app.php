<?php

// (1) استيراد الكلاسات الأساسية من نواة Laravel
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

// (2) استيراد Middleware المخصصة التي أنشأناها
use App\Http\Middleware\SetUserLocale;
use App\Http\Middleware\CheckRole;

// (3) إنشاء تطبيق Laravel جديد مع تحديد المسار الأساسي للمشروع
return Application::configure(basePath: dirname(__DIR__))

    // (4) withRouting(): تسجيل مسارات التطبيق
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
    )

    // (5) withMiddleware(): تسجيل وتكوين طبقات الـ Middleware
    ->withMiddleware(function (Middleware $middleware) {

        // (6) alias(): تسجيل Middleware المخصصة بأسماء مستعارة
        $middleware->alias([
            // (7) 'set.locale': لتطبيق لغة المستخدم تلقائياً
            'set.locale' => SetUserLocale::class,

            // (8) 'role': لفحص دور المستخدم قبل السماح بالدخول
            'role' => CheckRole::class,
        ]);
    })

    // (9) withExceptions(): تكوين كيفية التعامل مع الاستثناءات
    ->withExceptions(function (Exceptions $exceptions) {
        // (10) حالياً فارغ
    })

    // (11) create(): بناء وإرجاع كائن التطبيق الجاهز للتشغيل
    ->create();