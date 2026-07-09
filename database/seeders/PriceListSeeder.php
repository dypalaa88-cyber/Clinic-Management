<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceList;
use App\Models\PriceListItem;

class PriceListSeeder extends Seeder
{
    public function run(): void
    {
        // (1) إنشاء لائحة "أسعار نقدي 2026"
        $cashList = PriceList::create([
            'name'        => 'أسعار نقدي 2026',
            'description' => 'لائحة الأسعار النقدية الأساسية',
            'is_active'   => true,
        ]);

        // (2) بنود اللائحة النقدية
        $cashItems = [
            ['name' => 'كشف طبيب عام',           'category' => 'service',    'price' => 150,  'cost' => 0],
            ['name' => 'كشف أخصائي',              'category' => 'service',    'price' => 250,  'cost' => 0],
            ['name' => 'كشف استشاري',             'category' => 'service',    'price' => 350,  'cost' => 0],
            ['name' => 'تحليل صورة دم كاملة',     'category' => 'lab',        'price' => 120,  'cost' => 60],
            ['name' => 'تحليل سكر',               'category' => 'lab',        'price' => 50,   'cost' => 25],
            ['name' => 'تحليل بول',               'category' => 'lab',        'price' => 40,   'cost' => 20],
            ['name' => 'أشعة عادية',              'category' => 'radiology',  'price' => 200,  'cost' => 100],
            ['name' => 'أشعة مقطعية',             'category' => 'radiology',  'price' => 800,  'cost' => 500],
            ['name' => 'جلسة علاج طبيعي',         'category' => 'service',    'price' => 100,  'cost' => 0],
            ['name' => 'إزالة جبس',               'category' => 'service',    'price' => 80,   'cost' => 0],
            ['name' => 'باراسيتامول 500mg',       'category' => 'medicine',   'price' => 15,   'cost' => 8],
            ['name' => 'أموكسيسيلين 500mg',       'category' => 'medicine',   'price' => 45,   'cost' => 30],
            ['name' => 'حقنة كورتيزون',           'category' => 'medicine',   'price' => 60,   'cost' => 35],
            ['name' => 'سرنجة 5ml',               'category' => 'supply',     'price' => 5,    'cost' => 2],
            ['name' => 'شاش طبي',                 'category' => 'supply',     'price' => 10,   'cost' => 5],
        ];

        foreach ($cashItems as $item) {
            PriceListItem::create(array_merge($item, ['price_list_id' => $cashList->id]));
        }
    }
}