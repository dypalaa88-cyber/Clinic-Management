<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\InventoryItem;

// (3) تعريف كلاس InventoryItemSeeder
class InventoryItemSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء بيانات المخزون الأولية
     */
    public function run(): void
    {
        // (5) الأدوية
        $medicines = [
            ['name' => 'باراسيتامول 500mg',             'code' => 'MED-001', 'unit' => 'قرص',   'purchase_price' => 8,   'selling_price' => 15,  'quantity' => 500, 'min_quantity' => 50],
            ['name' => 'أموكسيسيلين 500mg',             'code' => 'MED-002', 'unit' => 'كبسولة','purchase_price' => 30,  'selling_price' => 45,  'quantity' => 300, 'min_quantity' => 30],
            ['name' => 'حقنة كورتيزون',                 'code' => 'MED-003', 'unit' => 'أمبول', 'purchase_price' => 35,  'selling_price' => 60,  'quantity' => 100, 'min_quantity' => 10],
            ['name' => 'إيبوبروفين 400mg',              'code' => 'MED-004', 'unit' => 'قرص',   'purchase_price' => 10,  'selling_price' => 20,  'quantity' => 400, 'min_quantity' => 40],
            ['name' => 'أوميبرازول 20mg',               'code' => 'MED-005', 'unit' => 'كبسولة','purchase_price' => 25,  'selling_price' => 40,  'quantity' => 200, 'min_quantity' => 20],
            ['name' => 'ميترونيدازول 500mg',            'code' => 'MED-006', 'unit' => 'قرص',   'purchase_price' => 12,  'selling_price' => 22,  'quantity' => 250, 'min_quantity' => 25],
            ['name' => 'سيفترياكسون حقن 1g',            'code' => 'MED-007', 'unit' => 'فيال',  'purchase_price' => 50,  'selling_price' => 85,  'quantity' => 80,  'min_quantity' => 10],
            ['name' => 'ديكلوفيناك صوديوم 50mg',        'code' => 'MED-008', 'unit' => 'قرص',   'purchase_price' => 6,   'selling_price' => 12,  'quantity' => 600, 'min_quantity' => 60],
            ['name' => 'كلورفينيرامين 4mg (حساسية)',    'code' => 'MED-009', 'unit' => 'قرص',   'purchase_price' => 5,   'selling_price' => 10,  'quantity' => 350, 'min_quantity' => 35],
            ['name' => 'محلول ملح 500ml',               'code' => 'MED-010', 'unit' => 'زجاجة', 'purchase_price' => 15,  'selling_price' => 30,  'quantity' => 150, 'min_quantity' => 15],
        ];

        foreach ($medicines as $item) {
            InventoryItem::create(array_merge($item, [
                'category'      => 'medicine',
                'expiry_date'   => now()->addMonths(rand(6, 36)),
                'batch_number'  => 'BATCH-' . strtoupper(fake()->bothify('??###')),
                'is_active'     => true,
            ]));
        }

        // (6) المستلزمات
        $supplies = [
            ['name' => 'سرنجة 5ml',                     'code' => 'SUP-001', 'unit' => 'قطعة',  'purchase_price' => 2,   'selling_price' => 5,   'quantity' => 1000, 'min_quantity' => 100],
            ['name' => 'شاش طبي (لفة)',                  'code' => 'SUP-002', 'unit' => 'لفة',   'purchase_price' => 5,   'selling_price' => 10,  'quantity' => 200, 'min_quantity' => 20],
            ['name' => 'كانيولا 20G',                    'code' => 'SUP-003', 'unit' => 'قطعة',  'purchase_price' => 8,   'selling_price' => 15,  'quantity' => 300, 'min_quantity' => 30],
            ['name' => 'لاصق طبي (شريط)',               'code' => 'SUP-004', 'unit' => 'شريط',  'purchase_price' => 3,   'selling_price' => 8,   'quantity' => 500, 'min_quantity' => 50],
            ['name' => 'قفازات طبية (علبة 100)',        'code' => 'SUP-005', 'unit' => 'علبة',  'purchase_price' => 25,  'selling_price' => 40,  'quantity' => 100, 'min_quantity' => 10],
            ['name' => 'قسطرة بولية 16F',               'code' => 'SUP-006', 'unit' => 'قطعة',  'purchase_price' => 12,  'selling_price' => 20,  'quantity' => 150, 'min_quantity' => 15],
            ['name' => 'خيط جراحي 2-0',                 'code' => 'SUP-007', 'unit' => 'بكرة',  'purchase_price' => 20,  'selling_price' => 35,  'quantity' => 80,  'min_quantity' => 10],
            ['name' => 'ماسك وجه جراحي',                'code' => 'SUP-008', 'unit' => 'قطعة',  'purchase_price' => 1,   'selling_price' => 3,   'quantity' => 2000, 'min_quantity' => 200],
        ];

        foreach ($supplies as $item) {
            InventoryItem::create(array_merge($item, [
                'category'      => 'supply',
                'expiry_date'   => now()->addMonths(rand(6, 36)),
                'batch_number'  => 'BATCH-' . strtoupper(fake()->bothify('??###')),
                'is_active'     => true,
            ]));
        }
    }
}