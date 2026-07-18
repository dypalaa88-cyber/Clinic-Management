<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\Patient;
use App\Models\Specialty;
use App\Models\Room;
use Carbon\Carbon;

class BookAppointmentAction
{
    public static function make(Patient $patient): Action
    {
        return Action::make('book_appointment')
            ->label('حجز موعد')
            ->icon('heroicon-o-calendar-days')
            ->color('success')

            ->form([
                // ========== قسم الحجز ==========
                Select::make('specialty_id')
                    ->label('التخصص')
                    ->placeholder('اختر التخصص')
                    ->options(Specialty::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($set) => $set('doctor_id', null)),

                Select::make('doctor_id')
                    ->label('الطبيب')
                    ->placeholder('اختر الطبيب')
                    ->options(function (Get $get) {
                        $specialtyId = $get('specialty_id');
                        if (!$specialtyId) return [];
                        return Doctor::whereHas('specialties', fn ($q) => $q->where('specialty_id', $specialtyId))
                            ->get()
                            ->mapWithKeys(fn ($d) => [$d->id => $d->first_name . ' ' . $d->last_name]);
                    })
                    ->searchable()
                    ->required(),

                Select::make('room_id')
                    ->label('الغرفة')
                    ->placeholder('اختر الغرفة (اختياري)')
                    ->options(Room::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->nullable(),

                DatePicker::make('appointment_date')
                    ->label('تاريخ الموعد')
                    ->default(now())
                    ->required()
                    ->rules(['after_or_equal:' . Carbon::today()->format('Y-m-d')]),

                Select::make('appointment_time')
                    ->label('وقت الموعد')
                    ->options(self::generateTimeOptions())
                    ->default(self::closestTime())
                    ->searchable()
                    ->required(),

                Select::make('type')
                    ->label('نوع الموعد')
                    ->options([
                        'scheduled' => 'محجوز مسبقاً',
                        'walk_in'   => 'حضور مباشر',
                    ])
                    ->default('scheduled')
                    ->required(),

                // ========== قسم الخدمات ==========
                Placeholder::make('consultation_price_label')
                    ->label('سعر الكشف')
                    ->content(function () use ($patient) {
                        $contract = $patient->contract;
                        if (!$contract || !$contract->priceList) return 'لا يوجد عقد';
                        $item = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                        return $item ? number_format($item->price, 2) . ' جنيه' : 'غير محدد';
                    }),

                // (1) خدمات إضافية — تظهر فقط خدمات التخصص المختار
                Select::make('additional_services')
                    ->label('خدمات إضافية')
                    ->placeholder('اختر خدمات إضافية (اختياري)')
                    ->options(function (Get $get) use ($patient) {
                        $contract = $patient->contract;
                        $specialtyId = $get('specialty_id');
                        if (!$contract || !$contract->priceList || !$specialtyId) return [];
                        return $contract->priceList->items()
                            ->where('is_active', true)
                            ->where('specialty_id', $specialtyId)
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->multiple()
                    ->searchable()
                    ->reactive(),

                // (2) الإجمالي قبل نسبة التحمل
                Placeholder::make('total_before_copay_label')
                    ->label('الإجمالي قبل التحمل')
                    ->content(function (Get $get) use ($patient) {
                        $contract = $patient->contract;
                        if (!$contract || !$contract->priceList) return '0.00 جنيه';
                        $total = 0;
                        $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                        if ($consultation) $total += $consultation->price;
                        $serviceIds = $get('additional_services') ?? [];
                        if ($serviceIds) {
                            $total += $contract->priceList->items()->whereIn('id', $serviceIds)->sum('price');
                        }
                        return number_format($total, 2) . ' جنيه';
                    }),

                // (3) نسبة تحمل المريض
                Placeholder::make('copay_info_label')
                    ->label('نسبة تحمل المريض')
                    ->content(function () use ($patient) {
                        $contract = $patient->contract;
                        if (!$contract) return 'لا يوجد عقد';
                        return $contract->copay_percentage . '%';
                    }),

                // (4) المجموع بعد نسبة التحمل (اللي هيدفعه المريض)
                Placeholder::make('total_after_copay_label')
                    ->label('المطلوب من المريض')
                    ->content(function (Get $get) use ($patient) {
                        $contract = $patient->contract;
                        if (!$contract || !$contract->priceList) return '0.00 جنيه';
                        $total = 0;
                        $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                        if ($consultation) $total += $consultation->price;
                        $serviceIds = $get('additional_services') ?? [];
                        if ($serviceIds) {
                            $total += $contract->priceList->items()->whereIn('id', $serviceIds)->sum('price');
                        }
                        // (5) حساب المبلغ بعد نسبة التحمل
                        $patientOwes = $total * $contract->copay_percentage / 100;
                        return number_format($patientOwes, 2) . ' جنيه';
                    }),

                // ========== قسم السداد ==========
                Select::make('payment_method')
                    ->label('طريقة الدفع')
                    ->options([
                        'cash'      => 'نقدي',
                        'card'      => 'بطاقة',
                        'insurance' => 'تأمين',
                        'corporate' => 'تعاقد',
                    ])
                    ->default('cash')
                    ->required(),

                TextInput::make('paid_amount')
                    ->label('المبلغ المدفوع')
                    ->numeric()
                    ->required()
                    ->reactive(),

                // (6) المتبقي — يحسب على المبلغ بعد التحمل
                Placeholder::make('remaining_label')
                    ->label('المبلغ المتبقي')
                    ->content(function (Get $get) use ($patient) {
                        $contract = $patient->contract;
                        if (!$contract || !$contract->priceList) return '0.00 جنيه';
                        $total = 0;
                        $consultation = $contract->priceList->items()->where('name', 'like', '%كشف%')->first();
                        if ($consultation) $total += $consultation->price;
                        $serviceIds = $get('additional_services') ?? [];
                        if ($serviceIds) {
                            $total += $contract->priceList->items()->whereIn('id', $serviceIds)->sum('price');
                        }
                        // (7) المبلغ المطلوب = الإجمالي × نسبة التحمل
                        $patientOwes = $total * $contract->copay_percentage / 100;
                        $paid = (float) ($get('paid_amount') ?? 0);
                        $remaining = $patientOwes - $paid;
                        if ($remaining < 0) {
                            return number_format(abs($remaining), 2) . ' جنيه (لصالح المريض)';
                        }
                        return number_format(max(0, $remaining), 2) . ' جنيه';
                    }),

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->placeholder('أي ملاحظات إضافية...')
                    ->maxLength(500),
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
                    if ($consultation) $total += $consultation->price;
                    $serviceIds = $data['additional_services'] ?? [];
                    if ($serviceIds) {
                        $total += $contract->priceList->items()->whereIn('id', $serviceIds)->sum('price');
                    }
                }

                // (8) المبلغ المطلوب من المريض = الإجمالي × نسبة التحمل
                $patientOwes = $total * $contract->copay_percentage / 100;
                $paid = (float) ($data['paid_amount'] ?? 0);
                $remaining = max(0, $patientOwes - $paid);
                $status = $paid >= $patientOwes ? 'paid' : ($paid > 0 ? 'partial' : 'pending');

                // (9) حفظ الدفع بالمبلغ الصحيح
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

                    $serviceIds = $data['additional_services'] ?? [];
                    if ($serviceIds) {
                        $services = $contract->priceList->items()->whereIn('id', $serviceIds)->get();
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
            ->modalCancelActionLabel('إلغاء');
    }

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