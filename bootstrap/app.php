<?php

// (1) استيراد الكلاسات الأساسية من نواة Laravel
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

// (2) استيراد Middleware المخصصة
use App\Http\Middleware\SetUserLocale;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckPermission;

// (3) إنشاء تطبيق Laravel جديد
return Application::configure(basePath: dirname(__DIR__))

    // (4) withRouting(): تسجيل مسارات التطبيق
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
    )

    // (5) withMiddleware(): تسجيل وتكوين طبقات الـ Middleware
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'set.locale'   => SetUserLocale::class,
            'role'         => CheckRole::class,
            'permission'   => CheckPermission::class,
        ]);
    })

    // (6) withExceptions(): تكوين كيفية التعامل مع الاستثناءات
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    // (7) create(): بناء وإرجاع كائن التطبيق الجاهز للتشغيل
    ->create();