<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// (3) تعريف كلاس Contract
class Contract extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
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

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
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

    /**
     * (7) priceList(): علاقة BelongsTo — كل عقد مرتبط بلائحة أسعار واحدة
     */
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }

    /**
     * (8) copayTiers(): علاقة HasMany — عقد واحد له عدة شرائح تحمل
     */
    public function copayTiers(): HasMany
    {
        return $this->hasMany(ContractCopayTier::class);
    }
}