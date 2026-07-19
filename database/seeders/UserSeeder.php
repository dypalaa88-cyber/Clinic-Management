<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// (3) تعريف كلاس UserSeeder
class UserSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء مستخدم Admin افتراضي
     */
    public function run(): void
    {
        // (5) firstOrCreate: ينشئ المستخدم إذا لم يكن موجوداً
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Mohammad Sanad',
                'password' => Hash::make('password'),
                'role'     => 'admin',
                'locale'   => 'ar',
            ]
        );
    }
}