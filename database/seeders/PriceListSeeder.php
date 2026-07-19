<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\PriceList;
use App\Models\PriceListItem;
use App\Models\Specialty;
use App\Models\Contract;

// (3) تعريف كلاس PriceListSeeder
class PriceListSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء لائحة نقدي كاملة مع جميع التخصصات والخدمات
     */
    public function run(): void
    {
        // (5) إنشاء لائحة "أسعار نقدي 2026"
        $cashList = PriceList::create([
            'name'        => 'أسعار نقدي 2026',
            'description' => 'لائحة الأسعار النقدية الأساسية',
            'is_active'   => true,
        ]);

        // (6) إنشاء عقد نقدي افتراضي
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

        // ========== (7) خدمات المعمل (بدون تخصص — مشتركة) ==========
        $labItems = [
            ['name' => 'تحليل صورة دم كاملة',       'category' => 'lab', 'price' => 120,  'cost' => 60],
            ['name' => 'تحليل سكر صايم',            'category' => 'lab', 'price' => 50,   'cost' => 25],
            ['name' => 'تحليل سكر فاطر',            'category' => 'lab', 'price' => 50,   'cost' => 25],
            ['name' => 'تحليل سكر تراكمي',          'category' => 'lab', 'price' => 150,  'cost' => 80],
            ['name' => 'تحليل بول كامل',            'category' => 'lab', 'price' => 40,   'cost' => 20],
            ['name' => 'تحليل براز',                'category' => 'lab', 'price' => 40,   'cost' => 20],
            ['name' => 'تحليل وظائف كبد',           'category' => 'lab', 'price' => 200,  'cost' => 120],
            ['name' => 'تحليل وظائف كلى',           'category' => 'lab', 'price' => 180,  'cost' => 100],
            ['name' => 'تحليل دهون ثلاثية',         'category' => 'lab', 'price' => 150,  'cost' => 80],
            ['name' => 'تحليل كولسترول',            'category' => 'lab', 'price' => 120,  'cost' => 60],
            ['name' => 'تحليل غدة درقية (TSH)',     'category' => 'lab', 'price' => 180,  'cost' => 100],
            ['name' => 'تحليل فيتامين د',           'category' => 'lab', 'price' => 250,  'cost' => 150],
            ['name' => 'تحليل فيتامين ب12',         'category' => 'lab', 'price' => 200,  'cost' => 120],
            ['name' => 'تحليل حمل',                 'category' => 'lab', 'price' => 80,   'cost' => 40],
            ['name' => 'تحليل سيولة دم (INR)',      'category' => 'lab', 'price' => 100,  'cost' => 50],
            ['name' => 'مزرعة بول',                 'category' => 'lab', 'price' => 120,  'cost' => 70],
            ['name' => 'تحليل حساسية',              'category' => 'lab', 'price' => 300,  'cost' => 200],
            ['name' => 'تحليل كورونا (PCR)',        'category' => 'lab', 'price' => 500,  'cost' => 350],
        ];

        foreach ($labItems as $item) {
            PriceListItem::create(array_merge($item, [
                'price_list_id' => $cashList->id,
                'specialty_id'  => null,
                'updated_by'    => null,
            ]));
        }

        // ========== (8) خدمات الأشعة (بدون تخصص — مشتركة) ==========
        $radiologyItems = [
            ['name' => 'أشعة عادية على أي جزء',      'category' => 'radiology', 'price' => 200,  'cost' => 100],
            ['name' => 'أشعة مقطعية على المخ',       'category' => 'radiology', 'price' => 800,  'cost' => 500],
            ['name' => 'أشعة مقطعية على البطن',      'category' => 'radiology', 'price' => 800,  'cost' => 500],
            ['name' => 'أشعة مقطعية على الصدر',      'category' => 'radiology', 'price' => 800,  'cost' => 500],
            ['name' => 'أشعة رنين مغناطيسي على المخ','category' => 'radiology', 'price' => 1500, 'cost' => 1000],
            ['name' => 'أشعة رنين مغناطيسي على العمود','category' => 'radiology', 'price' => 1500, 'cost' => 1000],
            ['name' => 'موجات صوتية على البطن',      'category' => 'radiology', 'price' => 400,  'cost' => 250],
            ['name' => 'موجات صوتية على الحوض',      'category' => 'radiology', 'price' => 400,  'cost' => 250],
            ['name' => 'دوبلر على الأوعية الدموية',  'category' => 'radiology', 'price' => 500,  'cost' => 300],
            ['name' => 'أشعة بانوراما أسنان',        'category' => 'radiology', 'price' => 250,  'cost' => 150],
            ['name' => 'أشعة ماموجرام',              'category' => 'radiology', 'price' => 400,  'cost' => 250],
        ];

        foreach ($radiologyItems as $item) {
            PriceListItem::create(array_merge($item, [
                'price_list_id' => $cashList->id,
                'specialty_id'  => null,
                'updated_by'    => null,
            ]));
        }

        // ========== (9) خدمات التخصصات ==========
        $specialtyServices = [
            'باطنة' => [
                ['name' => 'كشف باطنة',              'price' => 250],
                ['name' => 'رسم قلب',                'price' => 300],
                ['name' => 'منظار معدة',             'price' => 1200],
                ['name' => 'منظار قولون',            'price' => 1500],
                ['name' => 'علاج ضغط وسكر',          'price' => 150],
                ['name' => 'تركيب كانيولا',           'price' => 80],
            ],
            'أطفال' => [
                ['name' => 'كشف أطفال',              'price' => 200],
                ['name' => 'تطعيمات',                'price' => 100],
                ['name' => 'متابعة نمو',             'price' => 150],
                ['name' => 'علاج حساسية صدر',        'price' => 180],
                ['name' => 'علاج نزلة معوية',        'price' => 120],
            ],
            'جراحة عامة' => [
                ['name' => 'كشف جراحة',              'price' => 250],
                ['name' => 'عملية فتاق',             'price' => 5000],
                ['name' => 'عملية مرارة',            'price' => 8000],
                ['name' => 'خياطة جروح',             'price' => 300],
                ['name' => 'استئصال زائدة دودية',    'price' => 6000],
                ['name' => 'تغيير على الجرح',        'price' => 150],
            ],
            'عظام' => [
                ['name' => 'كشف عظام',               'price' => 250],
                ['name' => 'جبيرة',                  'price' => 400],
                ['name' => 'فك جبس',                 'price' => 200],
                ['name' => 'تركيب مسمار نخاعي',      'price' => 1000],
                ['name' => 'عملية غضروف',            'price' => 12000],
                ['name' => 'عملية رباط صليبي',       'price' => 15000],
                ['name' => 'حقنة مفصل',              'price' => 300],
            ],
            'نساء وتوليد' => [
                ['name' => 'كشف نساء',               'price' => 250],
                ['name' => 'متابعة حمل',             'price' => 300],
                ['name' => 'ولادة طبيعية',           'price' => 5000],
                ['name' => 'ولادة قيصرية',           'price' => 12000],
                ['name' => 'سونار',                  'price' => 200],
                ['name' => 'سونار رباعي الأبعاد',    'price' => 400],
                ['name' => 'تركيب لولب',             'price' => 500],
            ],
            'قلب وأوعية دموية' => [
                ['name' => 'كشف قلب',                'price' => 300],
                ['name' => 'رسم قلب',                'price' => 300],
                ['name' => 'موجات صوتية على القلب',  'price' => 500],
                ['name' => 'قسطرة قلب',              'price' => 15000],
                ['name' => 'تركيب دعامة',            'price' => 20000],
                ['name' => 'هولتر 24 ساعة',          'price' => 400],
            ],
            'جلدية' => [
                ['name' => 'كشف جلدية',              'price' => 200],
                ['name' => 'إزالة ثآليل',            'price' => 150],
                ['name' => 'علاج حب شباب',           'price' => 200],
                ['name' => 'جلسة ليزر',              'price' => 500],
                ['name' => 'حقن فيلر',               'price' => 1500],
                ['name' => 'بوتكس',                  'price' => 2000],
            ],
            'عيون' => [
                ['name' => 'كشف عيون',               'price' => 250],
                ['name' => 'فحص قاع العين',          'price' => 150],
                ['name' => 'قياس ضغط العين',         'price' => 100],
                ['name' => 'نظارة طبية',             'price' => 500],
                ['name' => 'عملية مياه بيضاء',       'price' => 8000],
                ['name' => 'ليزك',                   'price' => 10000],
            ],
            'أنف وأذن وحنجرة' => [
                ['name' => 'كشف أنف وأذن',           'price' => 200],
                ['name' => 'غسيل أذن',               'price' => 100],
                ['name' => 'منظار حنجرة',            'price' => 300],
                ['name' => 'عملية لوز',              'price' => 4000],
                ['name' => 'عملية حاجز أنفي',        'price' => 6000],
            ],
            'مسالك بولية' => [
                ['name' => 'كشف مسالك',              'price' => 250],
                ['name' => 'ديناميكية تبول',         'price' => 400],
                ['name' => 'تفتيت حصوات',            'price' => 3000],
                ['name' => 'عملية بروستاتا',         'price' => 12000],
                ['name' => 'تركيب قسطرة',            'price' => 200],
            ],
            'مخ وأعصاب' => [
                ['name' => 'كشف مخ وأعصاب',          'price' => 300],
                ['name' => 'رسم مخ',                 'price' => 500],
                ['name' => 'أشعة رنين مغناطيسي',     'price' => 1500],
                ['name' => 'علاج صداع نصفي',         'price' => 200],
                ['name' => 'حقن بوتكس للأعصاب',      'price' => 2500],
            ],
            'نفسية' => [
                ['name' => 'جلسة علاج نفسي',         'price' => 300],
                ['name' => 'اختبارات نفسية',         'price' => 500],
                ['name' => 'جلسة علاج معرفي سلوكي',  'price' => 350],
            ],
            'تخدير' => [
                ['name' => 'تخدير موضعي',            'price' => 200],
                ['name' => 'تخدير كلي',              'price' => 3000],
                ['name' => 'تخدير نصفي',             'price' => 1500],
            ],
            'علاج طبيعي' => [
                ['name' => 'جلسة علاج طبيعي',        'price' => 100],
                ['name' => 'جلسة تدليك',             'price' => 150],
                ['name' => 'تمارين تأهيلية',         'price' => 120],
                ['name' => 'كمادات ساخنة',           'price' => 50],
                ['name' => 'جلسة تنبيه عصبي',        'price' => 180],
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