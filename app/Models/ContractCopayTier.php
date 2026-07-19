<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// (3) تعريف كلاس ContractCopayTier
class ContractCopayTier extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية للاختبار
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'contract_id',
        'category',
        'tier_name',
        'percentage',
        'is_active',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'category'   => 'array',    // تحويل JSON إلى مصفوفة تلقائياً
            'percentage' => 'integer',
            'is_active'  => 'boolean',
        ];
    }

    /**
     * (7) contract(): علاقة BelongsTo — كل شريحة تنتمي إلى عقد واحد
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}