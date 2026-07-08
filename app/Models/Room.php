<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// (3) تعريف كلاس Room
class Room extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'name',
        'floor',
        'building',
        'type',
        'is_active',
        'notes',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}