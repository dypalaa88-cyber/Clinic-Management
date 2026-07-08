<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Room;

// (3) تعريف كلاس RoomSeeder
class RoomSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 30 غرفة وهمية
     */
    public function run(): void
    {
        Room::factory(30)->create();
    }
}