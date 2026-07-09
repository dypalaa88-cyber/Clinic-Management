<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use App\Models\PriceList;

class ContractSeeder extends Seeder
{
    public function run(): void
    {
        $priceList = PriceList::where('name', 'أسعار نقدي 2026')->first();

        if ($priceList) {
            Contract::create([
                'name'                => 'تعاقد شركة ميديكال للتأمين',
                'price_list_id'       => $priceList->id,
                'organization_name'   => 'شركة ميديكال للتأمين',
                'contract_type'       => 'insurance',
                'start_date'          => '2026-01-01',
                'end_date'            => '2026-12-31',
                'copay_percentage'    => 10,
                'discount_percentage' => 0,
                'is_active'           => true,
            ]);

            Contract::create([
                'name'                => 'تعاقد شركة الأمل للبترول',
                'price_list_id'       => $priceList->id,
                'organization_name'   => 'شركة الأمل للبترول',
                'contract_type'       => 'corporate',
                'start_date'          => '2026-01-01',
                'end_date'            => '2026-06-30',
                'copay_percentage'    => 0,
                'discount_percentage' => 15,
                'is_active'           => true,
            ]);
        }
    }
}