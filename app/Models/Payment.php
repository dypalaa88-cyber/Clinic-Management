<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'appointment_id',
        'contract_id',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'payment_method',
        'status',
        'notes',
        'received_by',
    ];

    protected function casts(): array
    {
        return [
            'total_amount'     => 'decimal:2',
            'paid_amount'      => 'decimal:2',
            'remaining_amount' => 'decimal:2',
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by');
    }

    // (1) علاقة HasMany: دفعة واحدة تحتوي على بنود كثيرة
    public function items(): HasMany
    {
        return $this->hasMany(PaymentItem::class);
    }
}