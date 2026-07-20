<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Http\Middleware;

// (2) استيراد الكلاسات المطلوبة
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RolePermission;

// (3) تعريف كلاس CheckPermission
class CheckPermission
{
    /**
     * (4) دالة handle(): نقطة دخول الـ Middleware
     */
    public function handle(Request $request, Closure $next): Response
    {
        // (5) السماح بكل طلبات Livewire و API الداخلية بدون فحص
        if ($request->is('livewire/*') || $request->is('api/*') || $request->ajax()) {
            return $next($request);
        }

        // (6) السماح بصفحات المصادقة (تسجيل الدخول، استعادة كلمة المرور) بدون فحص
        $routeName = $request->route()->getName();
        if ($routeName && (str_contains($routeName, 'auth') || str_contains($routeName, 'login'))) {
            return $next($request);
        }

        // (7) جلب المستخدم الحالي
        $user = auth()->user();

        // (8) إذا لم يكن مسجلاً، توجيه لتسجيل الدخول
        if (!$user) {
            return redirect()->route('filament.admin.pages.dashboard');
        }

        // (9) Admin يمرر دون فحص
        if ($user->role === 'admin') {
            return $next($request);
        }

        // (10) تحويل اسم المسار إلى اسم Resource
        $resource = $this->getResourceFromRoute($routeName);

        // (11) إذا لم يتم التعرف على Resource، اسمح بالمرور
        if (!$resource) {
            return $next($request);
        }

        // (12) البحث عن صلاحية المستخدم لهذه الشاشة
        $permission = RolePermission::where('role', $user->role)
            ->where('resource', $resource)
            ->where('can_view', true)
            ->first();

        // (13) إذا لم يملك صلاحية المشاهدة، منع الدخول
        if (!$permission) {
            abort(403, 'غير مصرح لك بالدخول إلى هذه الشاشة.');
        }

        return $next($request);
    }

    /**
     * (14) دالة getResourceFromRoute(): تحويل اسم المسار إلى اسم Resource
     */
    private function getResourceFromRoute(?string $routeName): ?string
    {
        if (!$routeName) {
            return null;
        }

        $map = [
            'dashboard'       => 'Dashboard',
            'patients'        => 'PatientResource',
            'appointments'    => 'AppointmentResource',
            'doctors'         => 'DoctorResource',
            'specialties'     => 'SpecialtyResource',
            'rooms'           => 'RoomResource',
            'schedules'       => 'ScheduleResource',
            'price-lists'     => 'PriceListResource',
            'contracts'       => 'ContractResource',
            'payments'        => 'PaymentResource',
            'inventory-items' => 'InventoryItemResource',
            'role-permissions'=> 'RolePermissionResource',
            'users'           => 'UserResource',
        ];

        foreach ($map as $path => $resource) {
            if (str_contains($routeName, $path)) {
                return $resource;
            }
        }

        return null;
    }
}