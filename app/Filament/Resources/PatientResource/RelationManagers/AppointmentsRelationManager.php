<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources\PatientResource\RelationManagers;

// (2) استيراد الكلاسات المطلوبة
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس AppointmentsRelationManager
class AppointmentsRelationManager extends RelationManager
{
    // (4) اسم العلاقة في الموديل
    protected static string $relationship = 'appointments';

    // (5) عنوان القسم
    protected static ?string $title = 'سجل الزيارات والمواعيد';

    // (6) تسمية السجل الواحد
    protected static ?string $modelLabel = 'زيارة';

    /**
     * (7) دالة table(): جدول عرض زيارات المريض
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                // (8) id: رقم الزيارة
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (9) appointment_date: تاريخ الزيارة
                TextColumn::make('appointment_date')
                    ->label('التاريخ')
                    ->date('Y-m-d')
                    ->sortable(),

                // (10) appointment_time: وقت الزيارة
                TextColumn::make('appointment_time')
                    ->label('الوقت')
                    ->time('H:i'),

                // (11) doctor: اسم الطبيب
                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => 
                        $record->doctor?->first_name . ' ' . $record->doctor?->last_name
                    ),

                // (12) doctor.specialties: تخصصات الطبيب
                TextColumn::make('doctor.specialties.name')
                    ->label('التخصص')
                    ->badge()
                    ->separator(', '),

                // (13) room: الغرفة
                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('—'),

                // (14) type: نوع الزيارة
                TextColumn::make('type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'scheduled' ? 'محجوز' : 'مباشر')
                    ->badge()
                    ->color(fn ($state) => $state === 'scheduled' ? 'primary' : 'warning'),

                // (15) status: حالة الزيارة
                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending'     => 'قيد الانتظار',
                        'confirmed'   => 'مؤكد',
                        'in_progress' => 'جاري الكشف',
                        'completed'   => 'مكتمل',
                        'cancelled'   => 'ملغي',
                        'no_show'     => 'لم يحضر',
                        default       => $state,
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'pending'     => 'gray',
                        'confirmed'   => 'info',
                        'in_progress' => 'warning',
                        'completed'   => 'success',
                        'cancelled'   => 'danger',
                        'no_show'     => 'danger',
                        default       => 'gray',
                    }),

                // (16) notes: ملاحظات
                TextColumn::make('notes')
                    ->label('ملاحظات')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // (17) فلتر حسب الحالة
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending'     => 'قيد الانتظار',
                        'confirmed'   => 'مؤكد',
                        'in_progress' => 'جاري الكشف',
                        'completed'   => 'مكتمل',
                        'cancelled'   => 'ملغي',
                        'no_show'     => 'لم يحضر',
                    ]),
            ])
            // (18) ترتيب افتراضي: الأحدث أولاً
            ->defaultSort('appointment_date', 'desc');
    }
}