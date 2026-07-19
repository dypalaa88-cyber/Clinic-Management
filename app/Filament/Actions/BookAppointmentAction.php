<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Actions;

// (2) استيراد الكلاسات المطلوبة
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\Patient;
use App\Models\Specialty;
use App\Models\Room;
use App\Models\ContractCopayTier;
use Carbon\Carbon;

// (3) تعريف كلاس BookAppointmentAction
class BookAppointmentAction
{
    /**
     * (4) دالة make(): إنشاء زر حجز موعد لمريض محدد
     */
    public static function make(Patient $patient): Action
    {
        return Action::make('book_appointment')
            ->label('حجز موعد')
            ->icon('heroicon-o-calendar-days')
            ->color('success')

            ->form([
                // ========== (5) شبكة Bootstrap: 12 عمود ==========
                Grid::make(12)
                    ->schema([

                        // ========== قسم الحجز (أعلى) ==========
                        // (6) التخصص — 6 أعمدة
                        Select::make('specialty_id')
                            ->label('التخصص')
                            ->placeholder('اختر التخصص')
                            ->options(Specialty::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($set) {
                                $set('doctor_id', null);
                            })
                            ->columnSpan(6),

                        // (7) الطبيب — 6 أعمدة
                        Select::make('doctor_id')
                            ->label('الطبيب')
                            ->placeholder('اختر الطبيب')
                            ->options(function (Get $get) {
                                $specialtyId = $get('specialty_id');
                                if (!$specialtyId) {
                                    return [];
                                }

                                return Doctor::whereHas('specialties', function ($query) use ($specialtyId) {
                                    $query->where('specialty_id', $specialtyId);
                                })
                                    ->get()
                                    ->mapWithKeys(function ($doctor) {
                                        return [$doctor->id => $doctor->first_name . ' ' . $doctor->last_name];
                                    });
                            })
                            ->searchable()
                            ->required()
                            ->columnSpan(6),

                        // (8) الغرفة — 6 أعمدة
                        Select::make('room_id')
                            ->label('الغرفة')
                            ->placeholder('اختر الغرفة (اختياري)')
                            ->options(Room::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->nullable()
                            ->columnSpan(6),

                        // (9) تاريخ الموعد — 6 أعمدة
                        DatePicker::make('appointment_date')
                            ->label('تاريخ الموعد')
                            ->default(now())
                            ->required()
                            ->rules(['after_or_equal:' . Carbon::today()->format('Y-m-d')])
                            ->columnSpan(6),

                        // (10) وقت الموعد — 3 أعمدة
                        Select::make('appointment_time')
                            ->label('وقت الموعد')
                            ->options(self::generateTimeOptions())
                            ->default(self::closestTime())
                            ->searchable()
                            ->required()
                            ->columnSpan(3),

                        // (11) نوع الموعد — 3 أعمدة
                        Select::make('type')
                            ->label('نوع الموعد')
                            ->options([
                                'scheduled' => 'محجوز مسبقاً',
                                'walk_in'   => 'حضور مباشر',
                            ])
                            ->default('scheduled')
                            ->required()
                            ->columnSpan(3),

                        // (12) شريحة التحمل — 6 أعمدة (تظهر إذا وجدت شرائح)
                        Select::make('copay_tier_id')
                            ->label('شريحة التحمل')
                            ->placeholder('اختر شريحة التحمل')
                            ->options(function () use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract) {
                                    return [];
                                }

                                $tiers = $contract->copayTiers()->where('is_active', true)->get();
                                if ($tiers->isEmpty()) {
                                    return [];
                                }

                                return $tiers->mapWithKeys(function ($tier) {
                                    $categories = is_array($tier->category)
                                        ? collect($tier->category)->join('، ')
                                        : $tier->category;

                                    $label = $tier->percentage . '%';
                                    if ($tier->tier_name) {
                                        $label .= ' - ' . $tier->tier_name;
                                    }
                                    $label .= ' (' . $categories . ')';

                                    return [$tier->id => $label];
                                });
                            })
                            ->visible(function () use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract) {
                                    return false;
                                }

                                return $contract->copayTiers()->where('is_active', true)->count() > 0;
                            })
                            ->reactive()
                            ->columnSpan(6),

                        // (13) سعر الكشف — 6 أعمدة
                        Placeholder::make('consultation_price_label')
                            ->label('سعر الكشف')
                            ->content(function () use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract || !$contract->priceList) {
                                    return 'لا يوجد عقد';
                                }

                                $item = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();

                                return $item ? number_format($item->price, 2) . ' جنيه' : 'غير محدد';
                            })
                            ->columnSpan(6),

                        // ========== قسم الخدمات (3 حقول متجاورة) ==========
                        // (14) خدمات التخصص — 4 أعمدة
                        Select::make('specialty_services')
                            ->label('🩺 خدمات التخصص')
                            ->placeholder('اختر خدمات التخصص')
                            ->options(function (Get $get) use ($patient) {
                                $contract = $patient->contract;
                                $specialtyId = $get('specialty_id');
                                if (!$contract || !$contract->priceList || !$specialtyId) {
                                    return [];
                                }

                                return $contract->priceList->items()
                                    ->where('is_active', true)
                                    ->where('specialty_id', $specialtyId)
                                    ->pluck('name', 'id')
                                    ->toArray();
                            })
                            ->multiple()
                            ->searchable()
                            ->reactive()
                            ->columnSpan(4),

                        // (15) خدمات المعمل — 4 أعمدة
                        Select::make('lab_services')
                            ->label('🔬 خدمات المعمل')
                            ->placeholder('اختر تحاليل')
                            ->options(function () use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract || !$contract->priceList) {
                                    return [];
                                }

                                return $contract->priceList->items()
                                    ->where('is_active', true)
                                    ->where('category', 'lab')
                                    ->pluck('name', 'id')
                                    ->toArray();
                            })
                            ->multiple()
                            ->searchable()
                            ->reactive()
                            ->columnSpan(4),

                        // (16) خدمات الأشعة — 4 أعمدة
                        Select::make('radiology_services')
                            ->label('🩻 خدمات الأشعة')
                            ->placeholder('اختر أشعة')
                            ->options(function () use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract || !$contract->priceList) {
                                    return [];
                                }

                                return $contract->priceList->items()
                                    ->where('is_active', true)
                                    ->where('category', 'radiology')
                                    ->pluck('name', 'id')
                                    ->toArray();
                            })
                            ->multiple()
                            ->searchable()
                            ->reactive()
                            ->columnSpan(4),

                        // ========== قسم المبالغ (أسفل الخدمات) ==========
                        // (17) الإجمالي قبل التحمل — 4 أعمدة
                        Placeholder::make('total_before_copay_label')
                            ->label('الإجمالي قبل التحمل')
                            ->content(function (Get $get) use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract || !$contract->priceList) {
                                    return '0.00 جنيه';
                                }

                                $total = 0;
                                $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                                if ($consultation) {
                                    $total += $consultation->price;
                                }

                                $allIds = array_merge(
                                    $get('specialty_services') ?? [],
                                    $get('lab_services') ?? [],
                                    $get('radiology_services') ?? []
                                );

                                if ($allIds) {
                                    $total += $contract->priceList->items()->whereIn('id', $allIds)->sum('price');
                                }

                                return number_format($total, 2) . ' جنيه';
                            })
                            ->columnSpan(4),

                        // (18) نسبة تحمل المريض — 4 أعمدة
                        Placeholder::make('copay_info_label')
                            ->label('نسبة تحمل المريض')
                            ->content(function (Get $get) use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract) {
                                    return 'لا يوجد عقد';
                                }

                                $tierId = $get('copay_tier_id');

                                if ($tierId) {
                                    $tier = ContractCopayTier::find($tierId);

                                    return $tier ? $tier->percentage . '%' : $contract->copay_percentage . '% (عام)';
                                }

                                return $contract->copay_percentage . '% (عام)';
                            })
                            ->columnSpan(4),

                        // (19) المطلوب من المريض — 4 أعمدة
                        Placeholder::make('total_after_copay_label')
                            ->label('المطلوب من المريض')
                            ->content(function (Get $get) use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract || !$contract->priceList) {
                                    return '0.00 جنيه';
                                }

                                $total = 0;
                                $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                                if ($consultation) {
                                    $total += $consultation->price;
                                }

                                $allIds = array_merge(
                                    $get('specialty_services') ?? [],
                                    $get('lab_services') ?? [],
                                    $get('radiology_services') ?? []
                                );

                                if ($allIds) {
                                    $total += $contract->priceList->items()->whereIn('id', $allIds)->sum('price');
                                }

                                $tierId = $get('copay_tier_id');
                                $percentage = $contract->copay_percentage;

                                if ($tierId) {
                                    $tier = ContractCopayTier::find($tierId);
                                    if ($tier) {
                                        $percentage = $tier->percentage;
                                    }
                                }

                                $patientOwes = $total * $percentage / 100;

                                return number_format($patientOwes, 2) . ' جنيه';
                            })
                            ->columnSpan(4),

                        // ========== قسم السداد ==========
                        // (20) طريقة الدفع — 6 أعمدة
                        Select::make('payment_method')
                            ->label('طريقة الدفع')
                            ->options([
                                'cash'      => 'نقدي',
                                'card'      => 'بطاقة',
                                'insurance' => 'تأمين',
                                'corporate' => 'تعاقد',
                            ])
                            ->default('cash')
                            ->required()
                            ->columnSpan(6),

                        // (21) المبلغ المدفوع — 6 أعمدة
                        TextInput::make('paid_amount')
                            ->label('المبلغ المدفوع')
                            ->numeric()
                            ->required()
                            ->reactive()
                            ->columnSpan(6),

                        // (22) المبلغ المتبقي — 6 أعمدة
                        Placeholder::make('remaining_label')
                            ->label('المبلغ المتبقي')
                            ->content(function (Get $get) use ($patient) {
                                $contract = $patient->contract;
                                if (!$contract || !$contract->priceList) {
                                    return '0.00 جنيه';
                                }

                                $total = 0;
                                $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                                if ($consultation) {
                                    $total += $consultation->price;
                                }

                                $allIds = array_merge(
                                    $get('specialty_services') ?? [],
                                    $get('lab_services') ?? [],
                                    $get('radiology_services') ?? []
                                );

                                if ($allIds) {
                                    $total += $contract->priceList->items()->whereIn('id', $allIds)->sum('price');
                                }

                                $tierId = $get('copay_tier_id');
                                $percentage = $contract->copay_percentage;

                                if ($tierId) {
                                    $tier = ContractCopayTier::find($tierId);
                                    if ($tier) {
                                        $percentage = $tier->percentage;
                                    }
                                }

                                $patientOwes = $total * $percentage / 100;
                                $paid = (float) ($get('paid_amount') ?? 0);
                                $remaining = $patientOwes - $paid;

                                if ($remaining < 0) {
                                    return number_format(abs($remaining), 2) . ' جنيه (لصالح المريض)';
                                }

                                return number_format(max(0, $remaining), 2) . ' جنيه';
                            })
                            ->columnSpan(6),

                        // (23) ملاحظات — 12 عمود (عرض كامل)
                        Textarea::make('notes')
                            ->label('ملاحظات')
                            ->placeholder('أي ملاحظات إضافية...')
                            ->maxLength(500)
                            ->columnSpan(12),

                    ]),
            ])

            ->action(function (array $data, Patient $record) {
                $appointment = Appointment::create([
                    'patient_id'       => $record->id,
                    'doctor_id'        => $data['doctor_id'],
                    'room_id'          => $data['room_id'] ?? null,
                    'appointment_date' => $data['appointment_date'],
                    'appointment_time' => $data['appointment_time'],
                    'type'             => $data['type'],
                    'status'           => 'pending',
                    'notes'            => $data['notes'] ?? null,
                    'created_by'       => auth()->id(),
                ]);

                $contract = $record->contract;
                $total = 0;

                if ($contract && $contract->priceList) {
                    $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                    if ($consultation) {
                        $total += $consultation->price;
                    }

                    $allIds = array_merge(
                        $data['specialty_services'] ?? [],
                        $data['lab_services'] ?? [],
                        $data['radiology_services'] ?? []
                    );

                    if ($allIds) {
                        $total += $contract->priceList->items()->whereIn('id', $allIds)->sum('price');
                    }
                }

                $tierId = $data['copay_tier_id'] ?? null;
                $percentage = $contract->copay_percentage ?? 0;

                if ($tierId) {
                    $tier = ContractCopayTier::find($tierId);
                    if ($tier) {
                        $percentage = $tier->percentage;
                    }
                }

                $patientOwes = $total * $percentage / 100;
                $paid = (float) ($data['paid_amount'] ?? 0);
                $remaining = max(0, $patientOwes - $paid);
                $status = $paid >= $patientOwes ? 'paid' : ($paid > 0 ? 'partial' : 'pending');

                $payment = Payment::create([
                    'patient_id'       => $record->id,
                    'appointment_id'   => $appointment->id,
                    'contract_id'      => $record->contract_id,
                    'total_amount'     => $patientOwes,
                    'paid_amount'      => $paid,
                    'remaining_amount' => $remaining,
                    'payment_method'   => $data['payment_method'] ?? 'cash',
                    'status'           => $status,
                    'received_by'      => auth()->id(),
                ]);

                if ($contract && $contract->priceList) {
                    $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                    if ($consultation) {
                        PaymentItem::create([
                            'payment_id' => $payment->id,
                            'name'       => $consultation->name,
                            'category'   => $consultation->category,
                            'price'      => $consultation->price,
                            'quantity'   => 1,
                            'total'      => $consultation->price,
                        ]);
                    }

                    $allIds = array_merge(
                        $data['specialty_services'] ?? [],
                        $data['lab_services'] ?? [],
                        $data['radiology_services'] ?? []
                    );

                    if ($allIds) {
                        $services = $contract->priceList->items()->whereIn('id', $allIds)->get();
                        foreach ($services as $service) {
                            PaymentItem::create([
                                'payment_id' => $payment->id,
                                'name'       => $service->name,
                                'category'   => $service->category,
                                'price'      => $service->price,
                                'quantity'   => 1,
                                'total'      => $service->price,
                            ]);
                        }
                    }
                }

                Notification::make()
                    ->title('تم حجز الموعد والسداد بنجاح')
                    ->success()
                    ->send();
            })

            ->modalHeading('حجز موعد جديد')
            ->modalSubmitActionLabel('حجز وسداد')
            ->modalCancelActionLabel('إلغاء')
            ->modalWidth('5xl');
    }

    /**
     * (24) دالة generateTimeOptions(): توليد قائمة أوقات من 09:00 إلى 22:00 كل 15 دقيقة
     */
    private static function generateTimeOptions(): array
    {
        $times = [];
        $start = Carbon::today()->setHour(9)->setMinute(0);
        $end = Carbon::today()->setHour(22)->setMinute(0);

        while ($start <= $end) {
            $value = $start->format('H:i');
            $times[$value] = $value;
            $start->addMinutes(15);
        }

        return $times;
    }

    /**
     * (25) دالة closestTime(): إيجاد أقرب وقت متاح بعد الآن بـ 5 دقائق
     */
    private static function closestTime(): string
    {
        $now = Carbon::now()->addMinutes(5);
        $hour = $now->hour;
        $minute = $now->minute;
        $roundedMinute = ceil($minute / 15) * 15;

        if ($roundedMinute >= 60) {
            $hour++;
            $roundedMinute = 0;
        }

        if ($hour >= 22) {
            return '09:00';
        }

        return sprintf('%02d:%02d', $hour, $roundedMinute);
    }
}