<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament;

// (2) استيراد الكلاسات المطلوبة من Filament لبناء عنصر في أعلى لوحة التحكم
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;

// (3) تعريف كلاس SwitchLocale المسؤول عن إنشاء زر تبديل اللغة
class SwitchLocale
{
    /**
     * (4) دالة make(): تنشئ زراً أو مجموعة أزرار لتبديل اللغة
     *     تُستدعى من Panel Provider لإضافتها إلى واجهة المستخدم
     *
     * @return ActionGroup
     */
    public static function make(): ActionGroup
    {
        // (5) ActionGroup::make(): ينشئ مجموعة أزرار منسدلة (Dropdown)
        return ActionGroup::make([

            // (6) Action::make('ar'): زر تبديل إلى العربية
            Action::make('ar')
                // (7) label(): النص الظاهر على الزر
                ->label('🇸🇦 العربية')
                // (8) action(): ما يحدث عند الضغط على الزر
                ->action(function () {
                    // (9) تحديث حقل locale للمستخدم الحالي إلى 'ar'
                    auth()->user()->update(['locale' => 'ar']);
                    // (10) إعادة تحميل الصفحة لتطبيق اللغة الجديدة
                    return redirect(request()->header('Referer'));
                }),

            // (11) Action::make('en'): زر تبديل إلى الإنجليزية
            Action::make('en')
                // (12) label(): النص الظاهر على الزر
                ->label('🇬🇧 English')
                // (13) action(): ما يحدث عند الضغط على الزر
                ->action(function () {
                    // (14) تحديث حقل locale للمستخدم الحالي إلى 'en'
                    auth()->user()->update(['locale' => 'en']);
                    // (15) إعادة تحميل الصفحة لتطبيق اللغة الجديدة
                    return redirect(request()->header('Referer'));
                }),

        ])
        // (16) label(): عنوان مجموعة الأزرار كما سيظهر في الشريط العلوي
        ->label('🌐 اللغة / Language')
        // (17) icon(): أيقونة مجموعة الأزرار (اختياري - يظهر أيقونة الكرة الأرضية)
        ->icon('heroicon-o-language')
        // (18) button(): يجعل المجموعة تظهر كزر أزرق واضح
        ->button();
    }
}