<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Providers\Filament;

// (2) استيراد الكلاسات المطلوبة من Filament
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// (3) تعريف كلاس AdminPanelProvider الذي يرث من PanelProvider
class AdminPanelProvider extends PanelProvider
{
    /**
     * (4) دالة panel(): تكوين وإعداد لوحة التحكم الرئيسية
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            // (5) default(): تعيين هذه اللوحة كلوحة افتراضية
            ->default()

            // (6) id('admin'): المعرف الداخلي للوحة
            ->id('admin')

            // (7) path('admin'): مسار URL للوصول إلى لوحة التحكم
            ->path('admin')

            // (8) login(): تفعيل صفحة تسجيل الدخول
            ->login()

            // (9) colors(): تخصيص ألوان واجهة المستخدم
            //     Color::Blue هو اللون الافتراضي المستقر لـ Filament 3.3
            ->colors([
                'primary' => Color::Blue,
            ])

            // (10) discoverResources(): اكتشاف موارد Filament تلقائياً
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')

            // (11) discoverPages(): اكتشاف الصفحات المخصصة تلقائياً
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')

            // (12) pages(): تسجيل الصفحات الأساسية يدوياً
            ->pages([
                \Filament\Pages\Dashboard::class,
                \App\Filament\Pages\EditProfile::class,
            ])

            // (13) discoverWidgets(): اكتشاف الودجات تلقائياً
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')

            // (14) middleware(): تسجيل طبقات الوسيط الأساسية + Middleware اللغة
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \App\Http\Middleware\SetUserLocale::class,
            ])

            // (15) authMiddleware(): طبقة وسيط المصادقة
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}