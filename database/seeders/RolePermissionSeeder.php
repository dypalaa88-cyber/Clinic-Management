<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\RolePermission;

// (3) تعريف كلاس RolePermissionSeeder
class RolePermissionSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء الصلاحيات الافتراضية لكل دور
     */
    public function run(): void
    {
        // (5) قائمة الشاشات الموجودة في النظام + Dashboard
        $resources = [
            'Dashboard',
            'PatientResource',
            'AppointmentResource',
            'DoctorResource',
            'SpecialtyResource',
            'RoomResource',
            'ScheduleResource',
            'PriceListResource',
            'ContractResource',
            'PaymentResource',
            'InventoryItemResource',
            'RolePermissionResource',
            'UserResource',
        ];

        // (6) Admin: كل الصلاحيات مفتوحة
        foreach ($resources as $resource) {
            RolePermission::firstOrCreate(
                ['role' => 'admin', 'resource' => $resource],
                ['can_view' => true, 'can_create' => true, 'can_edit' => true, 'can_delete' => true]
            );
        }

        // (7) Doctor: Dashboard فقط
        foreach ($resources as $resource) {
            $allowed = $resource === 'Dashboard';
            RolePermission::firstOrCreate(
                ['role' => 'doctor', 'resource' => $resource],
                ['can_view' => $allowed, 'can_create' => $allowed, 'can_edit' => $allowed, 'can_delete' => $allowed]
            );
        }

        // (8) Receptionist: Dashboard + المرضى + المواعيد + الفواتير
        $receptionistResources = ['Dashboard', 'PatientResource', 'AppointmentResource', 'PaymentResource'];

        foreach ($resources as $resource) {
            $allowed = in_array($resource, $receptionistResources);
            RolePermission::firstOrCreate(
                ['role' => 'receptionist', 'resource' => $resource],
                ['can_view' => $allowed, 'can_create' => $allowed, 'can_edit' => $allowed, 'can_delete' => $allowed]
            );
        }
    }
}