<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    // (1) علاقة One-to-Many: اللائحة تحتوي على بنود
    public function items(): HasMany
    {
        return $this->hasMany(PriceListItem::class);
    }

    // (2) علاقة التخصصات عبر بنود الأسعار (HasManyThrough)
    public function specialties()
    {
        return $this->hasManyThrough(
            Specialty::class,
            PriceListItem::class,
            'price_list_id',     // Foreign key on PriceListItem table
            'id',                 // Foreign key on Specialty table
            'id',                 // Local key on PriceList table
            'specialty_id'        // Local key on PriceListItem table
        )->distinct();
    }
}