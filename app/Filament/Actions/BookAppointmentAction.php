<?php

namespace App\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use App\Models\Doctor;
use App\Models\Appointment;
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

                // (1) تاريخ الموعد — يسمح بأي وقت في اليوم
                DatePicker::make('appointment_date')
                    ->label('تاريخ الموعد')
                    ->default(now())
                    ->required()
                    ->rules([
                        'after_or_equal:' . Carbon::today()->format('Y-m-d'),
                    ]),

                // (2) قائمة أوقات 24 ساعة
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

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->placeholder('أي ملاحظات إضافية...')
                    ->maxLength(500),
            ])

            ->action(function (array $data, Patient $record) {
                Appointment::create([
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

                Notification::make()
                    ->title('تم حجز الموعد بنجاح')
                    ->success()
                    ->send();
            })

            ->modalHeading('حجز موعد جديد')
            ->modalSubmitActionLabel('حجز')
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