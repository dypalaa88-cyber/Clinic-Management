<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceList;
use App\Models\PriceListItem;
use App\Models\Specialty;
use App\Models\Contract;

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

        // (2) إنشاء عقد نقدي افتراضي
        Contract::create([
            'name'                => 'نقدي - السعر الأساسي',
            'price_list_id'       => $cashList->id,
            'organization_name'   => 'المرضى النقديين',
            'contract_type'       => 'cash',
            'start_date'          => '2026-01-01',
            'end_date'            => '2030-12-31',
            'copay_percentage'    => 0,
            'discount_percentage' => 0,
            'is_active'           => true,
        ]);

        // (3) خدمات عامة (بدون تخصص)
        $generalItems = [
            ['name' => 'تحليل صورة دم كاملة',   'category' => 'lab',        'price' => 120,  'cost' => 60],
            ['name' => 'تحليل سكر',             'category' => 'lab',        'price' => 50,   'cost' => 25],
            ['name' => 'تحليل بول',             'category' => 'lab',        'price' => 40,   'cost' => 20],
            ['name' => 'أشعة عادية',            'category' => 'radiology',  'price' => 200,  'cost' => 100],
            ['name' => 'أشعة مقطعية',           'category' => 'radiology',  'price' => 800,  'cost' => 500],
            ['name' => 'باراسيتامول 500mg',     'category' => 'medicine',   'price' => 15,   'cost' => 8],
            ['name' => 'أموكسيسيلين 500mg',     'category' => 'medicine',   'price' => 45,   'cost' => 30],
            ['name' => 'حقنة كورتيزون',         'category' => 'medicine',   'price' => 60,   'cost' => 35],
            ['name' => 'سرنجة 5ml',             'category' => 'supply',     'price' => 5,    'cost' => 2],
            ['name' => 'شاش طبي',               'category' => 'supply',     'price' => 10,   'cost' => 5],
        ];

        foreach ($generalItems as $item) {
            PriceListItem::create(array_merge($item, [
                'price_list_id' => $cashList->id,
                'updated_by'    => null,
            ]));
        }

        // (4) خدمات التخصصات مع الأسعار
        $specialtyServices = [
            'باطنة' => [
                ['name' => 'كشف باطنة',              'price' => 250],
                ['name' => 'رسم قلب',                'price' => 300],
                ['name' => 'منظار معدة',             'price' => 1200],
                ['name' => 'علاج ضغط وسكر',          'price' => 150],
            ],
            'أطفال' => [
                ['name' => 'كشف أطفال',              'price' => 200],
                ['name' => 'تطعيمات',                'price' => 100],
                ['name' => 'متابعة نمو',             'price' => 150],
                ['name' => 'علاج حساسية صدر',        'price' => 180],
            ],
            'جراحة عامة' => [
                ['name' => 'كشف جراحة',              'price' => 250],
                ['name' => 'عملية فتاق',             'price' => 5000],
                ['name' => 'عملية مرارة',            'price' => 8000],
                ['name' => 'خياطة جروح',             'price' => 300],
            ],
            'عظام' => [
                ['name' => 'كشف عظام',               'price' => 250],
                ['name' => 'جبيرة',                  'price' => 400],
                ['name' => 'فك جبس',                 'price' => 200],
                ['name' => 'جلسة علاج طبيعي',        'price' => 100],
            ],
            'نساء وتوليد' => [
                ['name' => 'كشف نساء',               'price' => 250],
                ['name' => 'متابعة حمل',             'price' => 300],
                ['name' => 'ولادة طبيعية',           'price' => 5000],
                ['name' => 'ولادة قيصرية',           'price' => 12000],
                ['name' => 'سونار',                  'price' => 200],
            ],
            'قلب وأوعية دموية' => [
                ['name' => 'كشف قلب',                'price' => 300],
                ['name' => 'رسم قلب',                'price' => 300],
                ['name' => 'موجات صوتية على القلب',  'price' => 500],
                ['name' => 'قسطرة قلب',              'price' => 15000],
            ],
            'جلدية' => [
                ['name' => 'كشف جلدية',              'price' => 200],
                ['name' => 'إزالة ثآليل',            'price' => 150],
                ['name' => 'علاج حب شباب',           'price' => 200],
                ['name' => 'جلسة ليزر',              'price' => 500],
            ],
            'عيون' => [
                ['name' => 'كشف عيون',               'price' => 250],
                ['name' => 'فحص قاع العين',          'price' => 150],
                ['name' => 'قياس ضغط العين',         'price' => 100],
                ['name' => 'نظارة طبية',             'price' => 500],
                ['name' => 'عملية مياه بيضاء',       'price' => 8000],
            ],
            'أنف وأذن وحنجرة' => [
                ['name' => 'كشف أنف وأذن',           'price' => 200],
                ['name' => 'غسيل أذن',               'price' => 100],
                ['name' => 'منظار حنجرة',            'price' => 300],
                ['name' => 'عملية لوز',              'price' => 4000],
            ],
            'مسالك بولية' => [
                ['name' => 'كشف مسالك',              'price' => 250],
                ['name' => 'ديناميكية تبول',         'price' => 400],
                ['name' => 'تفتيت حصوات',            'price' => 3000],
            ],
            'مخ وأعصاب' => [
                ['name' => 'كشف مخ وأعصاب',          'price' => 300],
                ['name' => 'رسم مخ',                 'price' => 500],
                ['name' => 'أشعة رنين مغناطيسي',     'price' => 1500],
                ['name' => 'علاج صداع نصفي',         'price' => 200],
            ],
            'نفسية' => [
                ['name' => 'جلسة علاج نفسي',         'price' => 300],
                ['name' => 'اختبارات نفسية',         'price' => 500],
            ],
            'أشعة' => [
                ['name' => 'أشعة عادية',             'price' => 200],
                ['name' => 'أشعة مقطعية',            'price' => 800],
                ['name' => 'أشعة رنين مغناطيسي',     'price' => 1500],
                ['name' => 'موجات صوتية',            'price' => 400],
            ],
            'تخدير' => [
                ['name' => 'تخدير موضعي',            'price' => 200],
                ['name' => 'تخدير كلي',              'price' => 3000],
            ],
            'علاج طبيعي' => [
                ['name' => 'جلسة علاج طبيعي',        'price' => 100],
                ['name' => 'جلسة تدليك',             'price' => 150],
                ['name' => 'تمارين تأهيلية',         'price' => 120],
                ['name' => 'كمادات ساخنة',           'price' => 50],
            ],
        ];

        foreach ($specialtyServices as $specialtyName => $services) {
            $specialty = Specialty::where('name', $specialtyName)->first();
            if ($specialty) {
                foreach ($services as $service) {
                    PriceListItem::create([
                        'price_list_id' => $cashList->id,
                        'specialty_id'  => $specialty->id,
                        'name'          => $service['name'],
                        'category'      => 'service',
                        'price'         => $service['price'],
                        'cost'          => 0,
                        'is_active'     => true,
                        'updated_by'    => null,
                    ]);
                }
            }
        }
    }
}