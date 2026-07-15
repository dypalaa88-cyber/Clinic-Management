<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_list_id',
        'specialty_id',
        'name',
        'category',
        'price',
        'cost',
        'code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price'     => 'decimal:2',
            'cost'      => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    // (1) علاقة BelongsTo: كل بند ينتمي إلى لائحة
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }

    // (2) علاقة BelongsTo: كل بند مرتبط بتخصص (اختياري)
    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }
}