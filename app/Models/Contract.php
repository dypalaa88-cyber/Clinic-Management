<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_list_id',
        'organization_name',
        'contract_type',
        'start_date',
        'end_date',
        'copay_percentage',
        'discount_percentage',
        'notes',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'start_date'          => 'date',
            'end_date'            => 'date',
            'copay_percentage'    => 'integer',
            'discount_percentage'  => 'integer',
            'is_active'           => 'boolean',
        ];
    }

    // (1) علاقة BelongsTo: كل عقد مرتبط بلائحة أسعار واحدة
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }
}