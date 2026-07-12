<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'name',
        'category',
        'price',
        'quantity',
        'total',
    ];

    protected function casts(): array
    {
        return [
            'price'    => 'decimal:2',
            'total'    => 'decimal:2',
            'quantity' => 'integer',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}