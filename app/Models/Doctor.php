<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'license_number',
        'years_of_experience',
        'consultation_fee',
        'is_active',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'is_active'            => 'boolean',
            'consultation_fee'     => 'decimal:2',
            'years_of_experience'  => 'integer',
        ];
    }

    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'doctor_specialty')
            ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * (1) schedules(): علاقة HasMany — طبيب واحد لديه جداول كثيرة
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}