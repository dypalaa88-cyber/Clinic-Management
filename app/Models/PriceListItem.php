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
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'price'     => 'decimal:2',
            'cost'      => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }

    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }

    // (1) علاقة BelongsTo: من قام بآخر تعديل
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}