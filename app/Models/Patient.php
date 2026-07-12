<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'medical_history',
        'national_id',
        'contract_id',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'created_at'    => 'datetime',
            'updated_at'    => 'datetime',
        ];
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    // (1) علاقة HasMany: مريض واحد لديه مدفوعات كثيرة
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}