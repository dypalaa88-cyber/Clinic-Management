<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// (3) تعريف كلاس InventoryItem
class InventoryItem extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'name',
        'category',
        'code',
        'unit',
        'purchase_price',
        'selling_price',
        'quantity',
        'min_quantity',
        'expiry_date',
        'batch_number',
        'is_active',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'purchase_price' => 'decimal:2',
            'selling_price'  => 'decimal:2',
            'quantity'       => 'integer',
            'min_quantity'   => 'integer',
            'expiry_date'    => 'date',
            'is_active'      => 'boolean',
        ];
    }
}