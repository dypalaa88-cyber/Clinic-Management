# AI Context Report — Laravel Project

> ⚠️ **تحذير أمني**: هذا التقرير يحوي أسراراً حقيقية (`APP_KEY`, `DB_PASSWORD`, مفاتيح API).
> **لا ترفعه إلى Git ولا تشاركه علناً**. استخدمه لتغذية AI ثم احذفه.

**Project Path**: `C:\xampp\htdocs\clinic-management`
**Generated**: 2026-07-15 22:14:23 CEST
**Generator**: ai_context_dump.php v2.0

---

## 📊 معلومات المشروع

| المفتاح | القيمة |
|---|---|
| Laravel Version | `v11.54.0` |
| PHP Version | `8.2.12` |
| OS | Windows (Windows NT 10.0) |
| Total Files | 141 |
| Total Lines | 7,526 |
| Total Size | 281.4 KB |
| PHP Extensions | pdo_mysql, pdo_sqlite, mbstring, openssl, tokenizer, xml, ctype, json, bcmath, fileinfo, sodium, curl, zip, intl |

### إحصاءات Laravel

| النوع | العدد |
|---|---|
| Controllers | 3 |
| Models | 12 |
| Migrations | 25 |
| Middlewares | 2 |
| Providers | 2 |
| Seeders | 10 |
| Factories | 7 |
| Views | 4 |
| Tests | 3 |

### توزيع الملفات حسب النوع

| الامتداد | العدد |
|---|---|
| `.php` | 124 |
| `.js` | 5 |
| `.blade.php` | 4 |
| `.json` | 2 |
| `.env` | 2 |
| `.css` | 1 |
| `.` | 1 |
| `.xml` | 1 |
| `.md` | 1 |

---

## 📦 حزم Composer

**المشروع**: `laravel/laravel`

**PHP Constraint**: `^8.2`

### حزم الإنتاج (require)

| الاسم | القيد | المثبَّت | الوصف |
|---|---|---|---|
| `filament/filament` | `3.3` | `v3.3.0` | A collection of full-stack components for accelerated Laravel app development. |
| `laravel/framework` | `^11.31` | `v11.54.0` | The Laravel Framework. |
| `laravel/tinker` | `^2.9` | `v2.11.1` | Powerful REPL for the Laravel framework. |

### حزم التطوير (require-dev)

| الاسم | القيد | المثبَّت | الوصف |
|---|---|---|---|
| `fakerphp/faker` | `^1.23` | `v1.24.1` | Faker is a PHP library that generates fake data for you. |
| `laravel/pail` | `^1.1` | `v1.2.7` | Easily delve into your Laravel application's log files directly from the command |
| `laravel/pint` | `^1.13` | `v1.29.3` | An opinionated code formatter for PHP. |
| `laravel/sail` | `^1.26` | `v1.63.0` | Docker files for running a basic Laravel application. |
| `mockery/mockery` | `^1.6` | `1.6.12` | Mockery is a simple yet flexible PHP mock object framework |
| `nunomaduro/collision` | `^8.1` | `v8.9.4` | Cli error handling for console/command-line PHP applications. |
| `phpunit/phpunit` | `^11.0.1` | `11.5.56` | The PHP Unit Testing framework. |

---

## 🎨 حزم npm / Frontend

### Dependencies

_(لا توجد)_

### devDependencies

| الاسم | القيد | المثبَّت |
|---|---|---|
| `autoprefixer` | `^10.4.20` | `(not locked)` |
| `axios` | `^1.7.4` | `(not locked)` |
| `concurrently` | `^9.0.1` | `(not locked)` |
| `laravel-vite-plugin` | `^1.2.0` | `(not locked)` |
| `postcss` | `^8.4.47` | `(not locked)` |
| `tailwindcss` | `^3.4.13` | `(not locked)` |
| `vite` | `^6.0.11` | `(not locked)` |

---

## ⚙️ متغيرات البيئة (.env كاملاً)

> ⚠️ يحوي هذا القسم أسراراً حقيقية.

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/g66Npdvnm3m+AodrjONnr+5uprTcsjQ5DBSpQR3+6o=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US
APP_MAINTENANCE_DRIVER=file
PHP_CLI_SERVER_WORKERS=4
BCRYPT_ROUNDS=12
LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clinic_management
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database
CACHE_PREFIX=
MEMCACHED_HOST=127.0.0.1
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME=${APP_NAME}
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
VITE_APP_NAME=${APP_NAME}
```

---

## 🗄️ قاعدة البيانات

### 🔗 بيانات الاتصال

> ⚠️ بيانات اتصال حقيقية بما فيها كلمة المرور.

| المفتاح | القيمة |
|---|---|
| driver | `mysql` |
| host | `127.0.0.1` |
| port | `3306` |
| database | `clinic_management` |
| username | `root` |
| charset | `utf8mb4` |

> ⚠ **خطأ**: فشل الاتصال: SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it

---

## 🛣️ Routes

### routes/web.php

| Method | URI |
|---|---|
| `GET` | `/` |

---

## 📁 كود المشروع

> فقط الملفات التي أنشأها أو عدَّلها المطوّر — بدون كود Laravel الأصلي.

### 📂 `app` (65 files)

#### `app/Filament/Actions/BookAppointmentAction.php` — 146 lines, 5.1 KB

```php
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
```

#### `app/Filament/Pages/EditProfile.php` — 118 lines, 4.5 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Pages;

// (2) استيراد الكلاسات المطلوبة من Filament لبناء صفحة مخصصة
use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

// (3) تعريف كلاس EditProfile الذي يرث من Page
class EditProfile extends Page
{
    // (4) static string $view: تحديد مسار ملف Blade للصفحة
    protected static string $view = 'filament.pages.edit-profile';

    // (5) static ?string $title: عنوان الصفحة كما يظهر في لوحة التحكم
    protected static ?string $title = 'الملف الشخصي';

    // (6) static ?string $navigationIcon: أيقونة الصفحة في القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    // (7) static ?string $slug: الرابط المختصر للصفحة (/admin/edit-profile)
    protected static ?string $slug = 'edit-profile';

    // (8) خاصية لتخزين بيانات النموذج
    public ?array $data = [];

    /**
     * (9) دالة form(): بناء نموذج تعديل الملف الشخصي
     */
    public function form(Form $form): Form
    {
        return $form
            // (10) schema(): تعريف حقول النموذج
            ->schema([
                // (11) TextInput: حقل الاسم
                TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),

                // (12) TextInput: حقل البريد الإلكتروني
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                // (13) TextInput: حقل كلمة المرور (اختياري)
                TextInput::make('password')
                    ->label('كلمة المرور الجديدة')
                    ->password()
                    ->minLength(8)
                    ->dehydrateStateUsing(fn ($state) => !empty($state) ? bcrypt($state) : null)
                    ->dehydrated(fn ($state) => !empty($state)),

                // (14) Select: قائمة منسدلة لاختيار اللغة
                Select::make('locale')
                    ->label('اللغة / Language')
                    ->options([
                        'ar' => '🇸🇦 العربية',
                        'en' => '🇬🇧 English',
                    ])
                    ->default('ar')
                    ->required(),
            ])
            // (15) statePath('data'): يربط بيانات النموذج بمتغير $data
            ->statePath('data');
    }

    /**
     * (16) دالة mount(): تُستدعى عند فتح الصفحة لأول مرة
     */
    public function mount(): void
    {
        // (17) ملء $data ببيانات المستخدم المسجل دخوله
        $this->data = auth()->user()->only(['name', 'email', 'locale']);
    }

    /**
     * (18) دالة submit(): تُستدعى عند الضغط على زر الحفظ
     */
    public function submit(): void
    {
        // (19) تحديث بيانات المستخدم في قاعدة البيانات
        auth()->user()->update($this->data);

        // (20) تطبيق اللغة الجديدة فوراً على الجلسة الحالية
        //      بدون هذا السطر، الترجمة لا تنعكس إلا بعد تسجيل الخروج والدخول مجدداً
        app()->setLocale($this->data['locale']);

        // (21) إظهار إشعار نجاح داخل لوحة التحكم
        Notification::make()
            ->title('تم حفظ التغييرات بنجاح')
            ->success()
            ->send();

        // (22) إعادة تحميل الصفحة لتطبيق اللغة الجديدة
        redirect(request()->header('Referer'));
    }

    /**
     * (23) دالة getFormActions(): الأزرار التي تظهر أسفل النموذج
     */
    protected function getFormActions(): array
    {
        return [
            // (24) زر الحفظ
            Action::make('save')
                ->label('حفظ التغييرات')
                ->submit('submit'),
        ];
    }
}
```

#### `app/Filament/Resources/AppointmentResource/Pages/CreateAppointment.php` — 13 lines, 299.0 B

```php
<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;
}
```

#### `app/Filament/Resources/AppointmentResource/Pages/EditAppointment.php` — 20 lines, 425.0 B

```php
<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppointment extends EditRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/AppointmentResource/Pages/ListAppointments.php` — 20 lines, 428.0 B

```php
<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/AppointmentResource.php` — 209 lines, 8.2 KB

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'المواعيد';
    protected static ?string $modelLabel = 'موعد';
    protected static ?string $pluralModelLabel = 'المواعيد';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('المريض')
                    ->relationship('patient', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('room_id')
                    ->label('الغرفة')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                DatePicker::make('appointment_date')
                    ->label('تاريخ الموعد')
                    ->required(),

                TimePicker::make('appointment_time')
                    ->label('وقت الموعد')
                    ->required(),

                Select::make('type')
                    ->label('نوع الموعد')
                    ->options([
                        'scheduled' => 'محجوز مسبقاً',
                        'walk_in'   => 'حضور مباشر',
                    ])
                    ->default('scheduled')
                    ->required(),

                Select::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending'     => 'قيد الانتظار',
                        'confirmed'   => 'مؤكد',
                        'in_progress' => 'جاري الكشف',
                        'completed'   => 'مكتمل',
                        'cancelled'   => 'ملغي',
                        'no_show'     => 'لم يحضر',
                    ])
                    ->default('pending')
                    ->required(),

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('patient.first_name')
                    ->label('المريض')
                    ->formatStateUsing(fn ($record) => $record->patient->first_name . ' ' . $record->patient->last_name)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->doctor->first_name . ' ' . $record->doctor->last_name)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('—'),

                TextColumn::make('appointment_date')
                    ->label('التاريخ')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('appointment_time')
                    ->label('الوقت')
                    ->time('H:i'),

                TextColumn::make('type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'scheduled' ? 'محجوز' : 'مباشر')
                    ->badge()
                    ->color(fn ($state) => $state === 'scheduled' ? 'primary' : 'warning'),

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

                // (1) عمود "تم الكشف" — Toggle يشتغل مباشرة من الجدول
                ToggleColumn::make('is_completed')
                    ->label('تم الكشف')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name),

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

                Filter::make('appointment_date')
                    ->form([
                        DatePicker::make('date_from')->label('من تاريخ'),
                        DatePicker::make('date_to')->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['date_from'], fn ($q, $date) => $q->whereDate('appointment_date', '>=', $date))
                            ->when($data['date_to'], fn ($q, $date) => $q->whereDate('appointment_date', '<=', $date));
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit'   => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/ContractResource/Pages/CreateContract.php` — 13 lines, 287.0 B

```php
<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContract extends CreateRecord
{
    protected static string $resource = ContractResource::class;
}
```

#### `app/Filament/Resources/ContractResource/Pages/EditContract.php` — 20 lines, 413.0 B

```php
<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContract extends EditRecord
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/ContractResource/Pages/ListContracts.php` — 20 lines, 416.0 B

```php
<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContracts extends ListRecords
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/ContractResource.php` — 168 lines, 5.7 KB

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContractResource\Pages;
use App\Models\Contract;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'العقود';
    protected static ?string $modelLabel = 'عقد';
    protected static ?string $pluralModelLabel = 'العقود';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم العقد')
                    ->required()
                    ->maxLength(100),

                TextInput::make('organization_name')
                    ->label('اسم الجهة')
                    ->required()
                    ->maxLength(100),

                // (1) نوع العقد: نقدي أو تعاقد شركات
                Select::make('contract_type')
                    ->label('نوع العقد')
                    ->options([
                        'cash'      => 'نقدي',
                        'corporate' => 'تعاقد شركات',
                    ])
                    ->required(),

                Select::make('price_list_id')
                    ->label('لائحة الأسعار')
                    ->relationship('priceList', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('start_date')
                    ->label('تاريخ البداية')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('تاريخ النهاية')
                    ->required()
                    ->after('start_date'),

                TextInput::make('copay_percentage')
                    ->label('نسبة تحمل المريض (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->suffix('%'),

                TextInput::make('discount_percentage')
                    ->label('نسبة الخصم (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->suffix('%'),

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم العقد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('organization_name')
                    ->label('الجهة')
                    ->searchable(),

                // (2) عرض نوع العقد
                TextColumn::make('contract_type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'cash' ? 'نقدي' : 'تعاقد')
                    ->badge()
                    ->color(fn ($state) => $state === 'cash' ? 'success' : 'info'),

                TextColumn::make('priceList.name')
                    ->label('اللائحة'),

                TextColumn::make('start_date')
                    ->label('تاريخ البداية')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('تاريخ النهاية')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('copay_percentage')
                    ->label('تحمل المريض')
                    ->formatStateUsing(fn ($state) => $state . '%'),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('contract_type')
                    ->label('النوع')
                    ->options([
                        'cash'      => 'نقدي',
                        'corporate' => 'تعاقد',
                    ]),

                SelectFilter::make('is_active')
                    ->label('الحالة')
                    ->options([
                        true  => 'مفعّل',
                        false => 'غير مفعّل',
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit'   => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/DoctorResource/Pages/CreateDoctor.php` — 13 lines, 279.0 B

```php
<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDoctor extends CreateRecord
{
    protected static string $resource = DoctorResource::class;
}
```

#### `app/Filament/Resources/DoctorResource/Pages/EditDoctor.php` — 20 lines, 405.0 B

```php
<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctor extends EditRecord
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/DoctorResource/Pages/ListDoctors.php` — 20 lines, 408.0 B

```php
<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoctors extends ListRecords
{
    protected static string $resource = DoctorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/DoctorResource.php` — 181 lines, 6.7 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\DoctorResource\Pages;
use App\Models\Doctor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس DoctorResource
class DoctorResource extends Resource
{
    // (4) ربط الـ Resource بموديل Doctor
    protected static ?string $model = Doctor::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'الأطباء';
    protected static ?string $modelLabel = 'طبيب';
    protected static ?string $pluralModelLabel = 'الأطباء';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل طبيب
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) first_name: الاسم الأول
                TextInput::make('first_name')
                    ->label('الاسم الأول')
                    ->required()
                    ->maxLength(100),

                // (9) last_name: الاسم الأخير
                TextInput::make('last_name')
                    ->label('الاسم الأخير')
                    ->required()
                    ->maxLength(100),

                // (10) email: البريد الإلكتروني
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                // (11) phone: رقم الهاتف
                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->maxLength(20),

                // (12) license_number: رقم الترخيص
                TextInput::make('license_number')
                    ->label('رقم الترخيص الطبي')
                    ->required()
                    ->unique(ignoreRecord: true),

                // (13) specialties: اختيار التخصصات (علاقة Many-to-Many)
                Select::make('specialties')
                    ->label('التخصصات')
                    ->relationship('specialties', 'name')
                    ->multiple()           // يسمح باختيار أكثر من تخصص
                    ->preload()            // يحمّل الخيارات مسبقاً
                    ->searchable()         // قابل للبحث
                    ->required(),

                // (14) years_of_experience: سنوات الخبرة
                TextInput::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(60),

                // (15) consultation_fee: رسم الكشف
                TextInput::make('consultation_fee')
                    ->label('رسم الكشف (جنيه)')
                    ->numeric()
                    ->prefix('EGP'),

                // (16) is_active: تفعيل/تعطيل الطبيب
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (17) دالة table(): جدول عرض الأطباء
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (18) id: رقم الطبيب
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (19) first_name + last_name: الاسم الكامل
                TextColumn::make('first_name')
                    ->label('الاسم الأول')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_name')
                    ->label('الاسم الأخير')
                    ->searchable()
                    ->sortable(),

                // (20) specialties: عرض التخصصات مفصولة بفواصل
                TextColumn::make('specialties.name')
                    ->label('التخصصات')
                    ->badge()              // يعرض كل تخصص كبطاقة صغيرة
                    ->separator(', '),     // يفصل بين التخصصات بفاصلة

                // (21) consultation_fee: رسم الكشف
                TextColumn::make('consultation_fee')
                    ->label('رسم الكشف')
                    ->money('EGP')
                    ->sortable(),

                // (22) years_of_experience: سنوات الخبرة
                TextColumn::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->sortable(),

                // (23) is_active: أيقونة تفعيل/تعطيل
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),

                // (24) created_at: تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // (25) فلتر حسب التخصص
                SelectFilter::make('specialties')
                    ->label('التخصص')
                    ->relationship('specialties', 'name'),
            ]);
    }

    /**
     * (26) دالة getRelations(): العلاقات (فارغة حالياً)
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (27) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit'   => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/PatientResource/Pages/CreatePatient.php` — 13 lines, 283.0 B

```php
<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;
}
```

#### `app/Filament/Resources/PatientResource/Pages/EditPatient.php` — 31 lines, 1.0 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources\PatientResource\Pages;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\PatientResource;
use App\Filament\Actions\BookAppointmentAction;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

// (3) تعريف كلاس EditPatient
class EditPatient extends EditRecord
{
    // (4) ربط الصفحة بـ PatientResource
    protected static string $resource = PatientResource::class;

    /**
     * (5) دالة getHeaderActions(): الأزرار التي تظهر في أعلى صفحة تعديل المريض
     */
    protected function getHeaderActions(): array
    {
        return [
            // (6) زر حذف المريض (موجود افتراضياً)
            Actions\DeleteAction::make(),

            // (7) زر حجز موعد (الجديد) — يفتح Modal لإنشاء موعد لهذا المريض
            BookAppointmentAction::make($this->getRecord()),
        ];
    }
}
```

#### `app/Filament/Resources/PatientResource/Pages/ListPatients.php` — 19 lines, 411.0 B

```php
<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PatientResource/RelationManagers/AppointmentsRelationManager.php` — 117 lines, 4.6 KB

```php
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
```

#### `app/Filament/Resources/PatientResource/RelationManagers/PaymentsRelationManager.php` — 82 lines, 3.0 KB

```php
<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    protected static ?string $title = 'كشف حساب المريض';

    protected static ?string $modelLabel = 'دفعة';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#'),

                // (1) تفاصيل الخدمات
                TextColumn::make('items.name')
                    ->label('الخدمات')
                    ->listWithLineBreaks()
                    ->bulleted(),

                TextColumn::make('total_amount')
                    ->label('الإجمالي')
                    ->money('EGP')
                    ->summarize(Sum::make()->label('إجمالي الكل')->money('EGP')),

                TextColumn::make('paid_amount')
                    ->label('المدفوع')
                    ->money('EGP')
                    ->summarize(Sum::make()->label('إجمالي المدفوع')->money('EGP')),

                TextColumn::make('remaining_amount')
                    ->label('المتبقي')
                    ->money('EGP')
                    ->summarize(Sum::make()->label('إجمالي المتبقي')->money('EGP')),

                TextColumn::make('payment_method')
                    ->label('طريقة الدفع')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'cash'      => 'نقدي',
                        'card'      => 'بطاقة',
                        'insurance' => 'تأمين',
                        'corporate' => 'تعاقد',
                        default     => $state,
                    })
                    ->badge(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'paid'    => 'مسدد',
                        'partial' => 'مسدد جزئياً',
                        'pending' => 'غير مسدد',
                        default   => $state,
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'paid'    => 'success',
                        'partial' => 'warning',
                        'pending' => 'danger',
                        default   => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('التاريخ')
                    ->dateTime('Y-m-d H:i'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
```

#### `app/Filament/Resources/PatientResource/Widgets/PatientReportWidget.php` — 114 lines, 4.7 KB

```php
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقرير المرضى</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f5f5f5; }
        .stats { display: flex; gap: 15px; margin-bottom: 20px; }
        .stat-box { flex: 1; padding: 15px; border-radius: 8px; text-align: center; min-width: 100px; }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; }
        .btn-print { background: #2563eb; color: #fff; }
        .btn-excel { background: #16a34a; color: #fff; }
        .btn-csv { background: #ca8a04; color: #fff; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    {{-- (1) أزرار التصدير والطباعة --}}
    <div class="no-print" style="margin-bottom: 15px;">
        <button class="btn btn-print" onclick="window.print()">🖨️ طباعة</button>
        <button class="btn btn-excel" onclick="exportTable('excel')">📥 تصدير Excel</button>
        <button class="btn btn-csv" onclick="exportTable('csv')">📥 تصدير CSV</button>
    </div>

    {{-- (2) بطاقات الإحصائيات --}}
    <div class="stats">
        <div class="stat-box" style="background: #e8f5e9;">
            <div style="font-size: 28px; font-weight: bold; color: #2e7d32;">{{ $total }}</div>
            <div style="color: #666;">إجمالي المرضى</div>
        </div>
        <div class="stat-box" style="background: #e3f2fd;">
            <div style="font-size: 28px; font-weight: bold; color: #1565c0;">{{ $male }}</div>
            <div style="color: #666;">ذكور</div>
        </div>
        <div class="stat-box" style="background: #fce4ec;">
            <div style="font-size: 28px; font-weight: bold; color: #c62828;">{{ $female }}</div>
            <div style="color: #666;">إناث</div>
        </div>
    </div>

    {{-- (3) معلومات الفترة --}}
    <p style="color: #666; margin-bottom: 15px;">
        الفترة: <strong>{{ $dateFrom }} ← {{ $dateTo }}</strong>
    </p>

    {{-- (4) جدول التقرير --}}
    <table id="reportTable">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم كاملاً</th>
                <th>رقم الهاتف</th>
                <th>الجنس</th>
                <th>العمر</th>
                <th>العقد</th>
                <th>تاريخ التسجيل</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->gender === 'male' ? 'ذكر' : 'أنثى' }}</td>
                <td>{{ $patient->date_of_birth?->age ?? '—' }}</td>
                <td>{{ $patient->contract?->name ?? '—' }}</td>
                <td>{{ $patient->created_at->format('Y-m-d') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">لا توجد نتائج في هذه الفترة</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p style="margin-top: 10px; color: #666;">إجمالي النتائج: <strong>{{ $total }}</strong> مريض</p>

    {{-- (5) سكريبت التصدير --}}
    <script>
        function exportTable(type) {
            let table = document.getElementById('reportTable');
            let rows = table.querySelectorAll('tr');
            let data = [];
            
            rows.forEach(row => {
                let cols = row.querySelectorAll('th, td');
                let rowData = [];
                cols.forEach(col => rowData.push('"' + col.innerText.replace(/"/g, '""') + '"'));
                data.push(rowData.join(','));
            });

            let content = data.join('\n');
            let mime = type === 'excel' ? 'application/vnd.ms-excel' : 'text/csv';
            let ext = type === 'excel' ? '.xls' : '.csv';
            let bom = '\uFEFF';

            let blob = new Blob([bom + content], { type: mime + ';charset=utf-8;' });
            let link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'تقرير_المرضى' + ext;
            link.click();
        }
    </script>

</body>
</html>
```

#### `app/Filament/Resources/PatientResource.php` — 182 lines, 6.6 KB

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers\AppointmentsRelationManager;
use App\Models\Patient;
use App\Models\Contract;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'المرضى';
    protected static ?string $modelLabel = 'مريض';
    protected static ?string $pluralModelLabel = 'المرضى';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->label('الاسم الأول')
                    ->required()
                    ->maxLength(100),

                TextInput::make('last_name')
                    ->label('الاسم الأخير')
                    ->required()
                    ->maxLength(100),

                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->maxLength(20),

                DatePicker::make('date_of_birth')
                    ->label('تاريخ الميلاد')
                    ->required(),

                Select::make('gender')
                    ->label('الجنس')
                    ->options([
                        'male'   => 'ذكر',
                        'female' => 'أنثى',
                    ])
                    ->required(),

                // (1) العقد إجباري — يظهر فقط العقود السارية
                Select::make('contract_id')
                    ->label('العقد')
                    ->options(function () {
                        $today = Carbon::today();
                        return Contract::where('is_active', true)
                            ->whereDate('start_date', '<=', $today)
                            ->whereDate('end_date', '>=', $today)
                            ->get()
                            ->mapWithKeys(fn ($c) => [$c->id => $c->name . ' (' . $c->organization_name . ')']);
                    })
                    ->searchable()
                    ->required(),

                Textarea::make('address')
                    ->label('العنوان')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Textarea::make('medical_history')
                    ->label('التاريخ المرضي')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                TextInput::make('national_id')
                    ->label('الرقم القومي')
                    ->maxLength(14),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('first_name')
                    ->label('الاسم الأول')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_name')
                    ->label('الاسم الأخير')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->searchable(),

                TextColumn::make('contract.name')
                    ->label('العقد')
                    ->placeholder('—'),

                TextColumn::make('date_of_birth')
                    ->label('تاريخ الميلاد')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('gender')
                    ->label('الجنس')
                    ->formatStateUsing(fn ($state) => $state === 'male' ? 'ذكر' : 'أنثى'),

                TextColumn::make('national_id')
                    ->label('الرقم القومي')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('search')
                    ->label('بحث عن مريض')
                    ->form([
                        TextInput::make('query')
                            ->label('ابحث باسم المريض، رقم الهاتف، أو الرقم القومي')
                            ->placeholder('اكتب للبحث...'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['query'])) {
                            return $query;
                        }
                        $term = $data['query'];
                        return $query->where(function ($q) use ($term) {
                            $q->where('first_name', 'like', "%{$term}%")
                              ->orWhere('last_name', 'like', "%{$term}%")
                              ->orWhere('phone', 'like', "%{$term}%")
                              ->orWhere('national_id', 'like', "%{$term}%");
                        });
                    }),

                SelectFilter::make('gender')
                    ->label('الجنس')
                    ->options([
                        'male'   => 'ذكر',
                        'female' => 'أنثى',
                    ]),
            ]);
    }

   public static function getRelations(): array
{
    return [
        AppointmentsRelationManager::class,
        \App\Filament\Resources\PatientResource\RelationManagers\PaymentsRelationManager::class,
    ];
}
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit'   => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/PaymentResource/Pages/CreatePayment.php` — 13 lines, 283.0 B

```php
<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
```

#### `app/Filament/Resources/PaymentResource/Pages/EditPayment.php` — 20 lines, 409.0 B

```php
<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayment extends EditRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PaymentResource/Pages/ListPayments.php` — 20 lines, 412.0 B

```php
<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PaymentResource.php` — 143 lines, 5.1 KB

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages\ListPayments;
use App\Models\Payment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'الفواتير والمدفوعات';
    protected static ?string $modelLabel = 'فاتورة';
    protected static ?string $pluralModelLabel = 'الفواتير والمدفوعات';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('patient.first_name')
                    ->label('المريض')
                    ->formatStateUsing(fn ($record) => $record->patient?->first_name . ' ' . $record->patient?->last_name)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('appointment.doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->appointment?->doctor?->first_name . ' ' . $record->appointment?->doctor?->last_name)
                    ->placeholder('—'),

                TextColumn::make('contract.name')
                    ->label('العقد')
                    ->placeholder('—'),

                TextColumn::make('total_amount')
                    ->label('الإجمالي')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('paid_amount')
                    ->label('المدفوع')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('remaining_amount')
                    ->label('المتبقي')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('payment_method')
                    ->label('طريقة الدفع')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'cash'      => 'نقدي',
                        'card'      => 'بطاقة',
                        'insurance' => 'تأمين',
                        'corporate' => 'تعاقد',
                        default     => $state,
                    })
                    ->badge(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'paid'    => 'مسدد',
                        'partial' => 'مسدد جزئياً',
                        'pending' => 'غير مسدد',
                        default   => $state,
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'paid'    => 'success',
                        'partial' => 'warning',
                        'pending' => 'danger',
                        default   => 'gray',
                    }),

                TextColumn::make('receiver.name')
                    ->label('المستلم')
                    ->placeholder('—'),

                TextColumn::make('created_at')
                    ->label('تاريخ السداد')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'paid'    => 'مسدد',
                        'partial' => 'مسدد جزئياً',
                        'pending' => 'غير مسدد',
                    ]),

                Filter::make('created_at')
                    ->label('تاريخ السداد')
                    ->form([
                        DatePicker::make('date_from')->label('من تاريخ'),
                        DatePicker::make('date_to')->label('إلى تاريخ'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['date_from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['date_to'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPayments::route('/'),
        ];
    }
}
```

#### `app/Filament/Resources/PriceListItemResource/Pages/CreatePriceListItem.php` — 13 lines, 307.0 B

```php
<?php

namespace App\Filament\Resources\PriceListItemResource\Pages;

use App\Filament\Resources\PriceListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePriceListItem extends CreateRecord
{
    protected static string $resource = PriceListItemResource::class;
}
```

#### `app/Filament/Resources/PriceListItemResource/Pages/EditPriceListItem.php` — 20 lines, 433.0 B

```php
<?php

namespace App\Filament\Resources\PriceListItemResource\Pages;

use App\Filament\Resources\PriceListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceListItem extends EditRecord
{
    protected static string $resource = PriceListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PriceListItemResource/Pages/ListPriceListItems.php` — 20 lines, 436.0 B

```php
<?php

namespace App\Filament\Resources\PriceListItemResource\Pages;

use App\Filament\Resources\PriceListItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPriceListItems extends ListRecords
{
    protected static string $resource = PriceListItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PriceListItemResource.php` — 147 lines, 5.0 KB

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceListItemResource\Pages;
use App\Models\PriceListItem;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

class PriceListItemResource extends Resource
{
    protected static ?string $model = PriceListItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationLabel = 'بنود الأسعار';
    protected static ?string $modelLabel = 'بند سعر';
    protected static ?string $pluralModelLabel = 'بنود الأسعار';
    protected static ?string $navigationParentItem = 'لوائح الأسعار';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('price_list_id')
                    ->label('اللائحة')
                    ->relationship('priceList', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name')
                    ->label('اسم الخدمة / الصنف')
                    ->required()
                    ->maxLength(200),

                Select::make('category')
                    ->label('التصنيف')
                    ->options([
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        'service'    => 'خدمة طبية',
                    ])
                    ->required(),

                TextInput::make('price')
                    ->label('سعر البيع (جنيه)')
                    ->numeric()
                    ->required(),

                TextInput::make('cost')
                    ->label('سعر التكلفة (جنيه)')
                    ->numeric()
                    ->nullable(),

                TextInput::make('code')
                    ->label('الكود الداخلي')
                    ->maxLength(50)
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('priceList.name')
                    ->label('اللائحة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم الخدمة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('التصنيف')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        'service'    => 'خدمة طبية',
                        default      => $state,
                    })
                    ->badge(),

                TextColumn::make('price')
                    ->label('السعر')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('code')
                    ->label('الكود')
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('price_list_id')
                    ->label('اللائحة')
                    ->relationship('priceList', 'name'),

                SelectFilter::make('category')
                    ->label('التصنيف')
                    ->options([
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                        'service'    => 'خدمة طبية',
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPriceListItems::route('/'),
            'create' => Pages\CreatePriceListItem::route('/create'),
            'edit'   => Pages\EditPriceListItem::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/PriceListResource/Pages/CreatePriceList.php` — 13 lines, 291.0 B

```php
<?php

namespace App\Filament\Resources\PriceListResource\Pages;

use App\Filament\Resources\PriceListResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePriceList extends CreateRecord
{
    protected static string $resource = PriceListResource::class;
}
```

#### `app/Filament/Resources/PriceListResource/Pages/EditPriceList.php` — 20 lines, 417.0 B

```php
<?php

namespace App\Filament\Resources\PriceListResource\Pages;

use App\Filament\Resources\PriceListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceList extends EditRecord
{
    protected static string $resource = PriceListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PriceListResource/Pages/ListPriceLists.php` — 20 lines, 420.0 B

```php
<?php

namespace App\Filament\Resources\PriceListResource\Pages;

use App\Filament\Resources\PriceListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPriceLists extends ListRecords
{
    protected static string $resource = PriceListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/PriceListResource.php` — 87 lines, 2.6 KB

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceListResource\Pages;
use App\Models\PriceList;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class PriceListResource extends Resource
{
    protected static ?string $model = PriceList::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'لوائح الأسعار';
    protected static ?string $modelLabel = 'لائحة أسعار';
    protected static ?string $pluralModelLabel = 'لوائح الأسعار';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم اللائحة')
                    ->required()
                    ->maxLength(100),

                Textarea::make('description')
                    ->label('الوصف')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مفعّلة')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم اللائحة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('items_count')
                    ->label('عدد البنود')
                    ->counts('items')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('مفعّلة')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPriceLists::route('/'),
            'create' => Pages\CreatePriceList::route('/create'),
            'edit'   => Pages\EditPriceList::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/RoomResource/Pages/CreateRoom.php` — 13 lines, 271.0 B

```php
<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\RoomResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRoom extends CreateRecord
{
    protected static string $resource = RoomResource::class;
}
```

#### `app/Filament/Resources/RoomResource/Pages/EditRoom.php` — 20 lines, 397.0 B

```php
<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\RoomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoom extends EditRecord
{
    protected static string $resource = RoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/RoomResource/Pages/ListRooms.php` — 20 lines, 400.0 B

```php
<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\RoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRooms extends ListRecords
{
    protected static string $resource = RoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/RoomResource.php` — 156 lines, 5.2 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

// (3) تعريف كلاس RoomResource
class RoomResource extends Resource
{
    // (4) ربط الـ Resource بموديل Room
    protected static ?string $model = Room::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'الغرف والعيادات';
    protected static ?string $modelLabel = 'غرفة';
    protected static ?string $pluralModelLabel = 'الغرف والعيادات';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل غرفة
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) name: اسم الغرفة
                TextInput::make('name')
                    ->label('اسم الغرفة')
                    ->required()
                    ->maxLength(50),

                // (9) floor: الطابق
                TextInput::make('floor')
                    ->label('الطابق')
                    ->maxLength(20),

                // (10) building: المبنى
                TextInput::make('building')
                    ->label('المبنى')
                    ->maxLength(50),

                // (11) type: نوع الغرفة
                Select::make('type')
                    ->label('نوع الغرفة')
                    ->options([
                        'examination' => 'غرفة كشف',
                        'procedure'   => 'غرفة إجراءات',
                        'emergency'   => 'طوارئ',
                        'waiting'     => 'قاعة انتظار',
                        'office'      => 'مكتب إداري',
                    ])
                    ->required(),

                // (12) notes: ملاحظات
                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // (13) is_active: تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّلة')
                    ->default(true),
            ]);
    }

    /**
     * (14) دالة table(): جدول عرض الغرف
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (15) id: رقم الغرفة
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (16) name: اسم الغرفة
                TextColumn::make('name')
                    ->label('اسم الغرفة')
                    ->searchable()
                    ->sortable(),

                // (17) floor: الطابق
                TextColumn::make('floor')
                    ->label('الطابق')
                    ->searchable(),

                // (18) building: المبنى
                TextColumn::make('building')
                    ->label('المبنى')
                    ->searchable(),

                // (19) type: نوع الغرفة
                TextColumn::make('type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'examination' => 'غرفة كشف',
                        'procedure'   => 'غرفة إجراءات',
                        'emergency'   => 'طوارئ',
                        'waiting'     => 'قاعة انتظار',
                        'office'      => 'مكتب إداري',
                        default       => $state,
                    }),

                // (20) is_active: أيقونة تفعيل/تعطيل
                IconColumn::make('is_active')
                    ->label('مفعّلة')
                    ->boolean(),

                // (21) created_at: تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    /**
     * (22) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (23) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit'   => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/ScheduleResource/Pages/CreateSchedule.php` — 13 lines, 287.0 B

```php
<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use App\Filament\Resources\ScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSchedule extends CreateRecord
{
    protected static string $resource = ScheduleResource::class;
}
```

#### `app/Filament/Resources/ScheduleResource/Pages/EditSchedule.php` — 20 lines, 413.0 B

```php
<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use App\Filament\Resources\ScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchedule extends EditRecord
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/ScheduleResource/Pages/ListSchedules.php` — 20 lines, 416.0 B

```php
<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use App\Filament\Resources\ScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchedules extends ListRecords
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/ScheduleResource.php` — 245 lines, 9.6 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس ScheduleResource
class ScheduleResource extends Resource
{
    // (4) ربط الـ Resource بموديل Schedule
    protected static ?string $model = Schedule::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'جداول الأطباء';
    protected static ?string $modelLabel = 'جدول طبيب';
    protected static ?string $pluralModelLabel = 'جداول الأطباء';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل جدول طبيب
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) schedule_type: اختيار نوع الجدول (دوري أو استثنائي)
                Select::make('schedule_type')
                    ->label('نوع الجدول')
                    ->options([
                        'recurring' => 'دوري (متكرر أسبوعياً)',
                        'override'  => 'جدول استثنائي (يوم واحد)',
                    ])
                    ->default('recurring')
                    ->required()
                    ->reactive(),

                // (9) doctor_id: اختيار الطبيب
                Select::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                // (10) room_id: اختيار الغرفة
                Select::make('room_id')
                    ->label('الغرفة')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                // (11) override_date: تاريخ الجدول الاستثنائي (يظهر فقط إذا النوع = override)
                DatePicker::make('override_date')
                    ->label('تاريخ الجدول الاستثنائي')
                    ->visible(fn ($get) => $get('schedule_type') === 'override')
                    ->required(fn ($get) => $get('schedule_type') === 'override')
                    ->minDate(now()),

                // (12) recurring_days: أيام الأسبوع (يظهر فقط إذا النوع = recurring)
                CheckboxList::make('recurring_days')
                    ->label('أيام العمل الأسبوعية')
                    ->options([
                        0 => 'الأحد',
                        1 => 'الإثنين',
                        2 => 'الثلاثاء',
                        3 => 'الأربعاء',
                        4 => 'الخميس',
                        5 => 'الجمعة',
                        6 => 'السبت',
                    ])
                    ->visible(fn ($get) => $get('schedule_type') === 'recurring')
                    ->required(fn ($get) => $get('schedule_type') === 'recurring')
                    ->columns(3),

                // (13) start_date / end_date: نطاق التواريخ للجدول الدوري
                DatePicker::make('start_date')
                    ->label('تاريخ بدء الجدول (اختياري)')
                    ->visible(fn ($get) => $get('schedule_type') === 'recurring'),

                DatePicker::make('end_date')
                    ->label('تاريخ انتهاء الجدول (اختياري)')
                    ->visible(fn ($get) => $get('schedule_type') === 'recurring')
                    ->after('start_date'),

                // (14) start_time: وقت البدء
                TimePicker::make('start_time')
                    ->label('وقت البدء')
                    ->required(),

                // (15) end_time: وقت الانتهاء
                TimePicker::make('end_time')
                    ->label('وقت الانتهاء')
                    ->required()
                    ->after('start_time'),

                // (16) slot_duration: مدة الكشف
                Select::make('slot_duration')
                    ->label('مدة الكشف (دقيقة)')
                    ->options([
                        15 => '15 دقيقة',
                        20 => '20 دقيقة',
                        30 => '30 دقيقة',
                    ])
                    ->default(15)
                    ->required(),

                // (17) max_patients: الحد الأقصى
                TextInput::make('max_patients')
                    ->label('الحد الأقصى للمرضى')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->nullable(),

                // (18) is_active: تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ])
            ->columns(2);
    }

    /**
     * (19) دالة table(): جدول عرض جداول الأطباء
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (20) id
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (21) schedule_type: نوع الجدول
                TextColumn::make('schedule_type')
                    ->label('النوع')
                    ->formatStateUsing(fn ($state) => $state === 'recurring' ? 'دوري' : 'استثنائي')
                    ->badge()
                    ->color(fn ($state) => $state === 'recurring' ? 'success' : 'warning'),

                // (22) doctor: اسم الطبيب
                TextColumn::make('doctor.first_name')
                    ->label('الطبيب')
                    ->formatStateUsing(fn ($record) => $record->doctor->first_name . ' ' . $record->doctor->last_name)
                    ->searchable()
                    ->sortable(),

                // (23) room: الغرفة
                TextColumn::make('room.name')
                    ->label('الغرفة')
                    ->placeholder('—'),

                // (24) recurring_days: أيام العمل (للدوري فقط)
                TextColumn::make('recurring_days')
                    ->label('الأيام')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '—';
                        $days = [0 => 'أحد', 1 => 'إثنين', 2 => 'ثلاثاء', 3 => 'أربعاء', 4 => 'خميس', 5 => 'جمعة', 6 => 'سبت'];
                        return collect($state)->map(fn ($d) => $days[$d] ?? '')->join('، ');
                    }),

                // (25) override_date: تاريخ الاستثنائي
                TextColumn::make('override_date')
                    ->label('تاريخ استثنائي')
                    ->date('Y-m-d')
                    ->placeholder('—'),

                // (26) start_time - end_time
                TextColumn::make('start_time')
                    ->label('من')
                    ->time('H:i'),

                TextColumn::make('end_time')
                    ->label('إلى')
                    ->time('H:i'),

                // (27) slot_duration
                TextColumn::make('slot_duration')
                    ->label('مدة الكشف')
                    ->formatStateUsing(fn ($state) => $state . ' دقيقة'),

                // (28) is_active
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),
            ])
            ->filters([
                // (29) فلتر حسب النوع
                SelectFilter::make('schedule_type')
                    ->label('النوع')
                    ->options([
                        'recurring' => 'دوري',
                        'override'  => 'استثنائي',
                    ]),

                // (30) فلتر حسب الطبيب
                SelectFilter::make('doctor_id')
                    ->label('الطبيب')
                    ->relationship('doctor', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name),
            ]);
    }

    /**
     * (31) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (32) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit'   => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/Resources/SpecialtyResource/Pages/CreateSpecialty.php` — 13 lines, 291.0 B

```php
<?php

namespace App\Filament\Resources\SpecialtyResource\Pages;

use App\Filament\Resources\SpecialtyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpecialty extends CreateRecord
{
    protected static string $resource = SpecialtyResource::class;
}
```

#### `app/Filament/Resources/SpecialtyResource/Pages/EditSpecialty.php` — 20 lines, 417.0 B

```php
<?php

namespace App\Filament\Resources\SpecialtyResource\Pages;

use App\Filament\Resources\SpecialtyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecialty extends EditRecord
{
    protected static string $resource = SpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/SpecialtyResource/Pages/ListSpecialties.php` — 20 lines, 421.0 B

```php
<?php

namespace App\Filament\Resources\SpecialtyResource\Pages;

use App\Filament\Resources\SpecialtyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecialties extends ListRecords
{
    protected static string $resource = SpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

#### `app/Filament/Resources/SpecialtyResource.php` — 118 lines, 3.8 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\SpecialtyResource\Pages;
use App\Models\Specialty;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

// (3) تعريف كلاس SpecialtyResource
class SpecialtyResource extends Resource
{
    // (4) ربط الـ Resource بموديل Specialty
    protected static ?string $model = Specialty::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'التخصصات';
    protected static ?string $modelLabel = 'تخصص';
    protected static ?string $pluralModelLabel = 'التخصصات';

    /**
     * (7) دالة form(): نموذج إضافة وتعديل تخصص
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (8) name: اسم التخصص
                TextInput::make('name')
                    ->label('اسم التخصص')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),

                // (9) description: وصف التخصص
                Textarea::make('description')
                    ->label('الوصف')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // (10) is_active: تفعيل/تعطيل التخصص
                Toggle::make('is_active')
                    ->label('مفعّل')
                    ->default(true),
            ]);
    }

    /**
     * (11) دالة table(): جدول عرض التخصصات
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // (12) id: رقم التخصص
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                // (13) name: اسم التخصص
                TextColumn::make('name')
                    ->label('اسم التخصص')
                    ->searchable()
                    ->sortable(),

                // (14) description: الوصف (مختصر)
                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                // (15) is_active: أيقونة تفعيل/تعطيل
                IconColumn::make('is_active')
                    ->label('مفعّل')
                    ->boolean(),

                // (16) created_at: تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    /**
     * (17) دالة getRelations(): العلاقات (فارغة حالياً - سنضيف الأطباء لاحقاً)
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * (18) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSpecialties::route('/'),
            'create' => Pages\CreateSpecialty::route('/create'),
            'edit'   => Pages\EditSpecialty::route('/{record}/edit'),
        ];
    }
}
```

#### `app/Filament/SwitchLocale.php` — 56 lines, 2.6 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament;

// (2) استيراد الكلاسات المطلوبة من Filament لبناء عنصر في أعلى لوحة التحكم
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;

// (3) تعريف كلاس SwitchLocale المسؤول عن إنشاء زر تبديل اللغة
class SwitchLocale
{
    /**
     * (4) دالة make(): تنشئ زراً أو مجموعة أزرار لتبديل اللغة
     *     تُستدعى من Panel Provider لإضافتها إلى واجهة المستخدم
     *
     * @return ActionGroup
     */
    public static function make(): ActionGroup
    {
        // (5) ActionGroup::make(): ينشئ مجموعة أزرار منسدلة (Dropdown)
        return ActionGroup::make([

            // (6) Action::make('ar'): زر تبديل إلى العربية
            Action::make('ar')
                // (7) label(): النص الظاهر على الزر
                ->label('🇸🇦 العربية')
                // (8) action(): ما يحدث عند الضغط على الزر
                ->action(function () {
                    // (9) تحديث حقل locale للمستخدم الحالي إلى 'ar'
                    auth()->user()->update(['locale' => 'ar']);
                    // (10) إعادة تحميل الصفحة لتطبيق اللغة الجديدة
                    return redirect(request()->header('Referer'));
                }),

            // (11) Action::make('en'): زر تبديل إلى الإنجليزية
            Action::make('en')
                // (12) label(): النص الظاهر على الزر
                ->label('🇬🇧 English')
                // (13) action(): ما يحدث عند الضغط على الزر
                ->action(function () {
                    // (14) تحديث حقل locale للمستخدم الحالي إلى 'en'
                    auth()->user()->update(['locale' => 'en']);
                    // (15) إعادة تحميل الصفحة لتطبيق اللغة الجديدة
                    return redirect(request()->header('Referer'));
                }),

        ])
        // (16) label(): عنوان مجموعة الأزرار كما سيظهر في الشريط العلوي
        ->label('🌐 اللغة / Language')
        // (17) icon(): أيقونة مجموعة الأزرار (اختياري - يظهر أيقونة الكرة الأرضية)
        ->icon('heroicon-o-language')
        // (18) button(): يجعل المجموعة تظهر كزر أزرق واضح
        ->button();
    }
}
```

#### `app/Http/Controllers/Controller.php` — 9 lines, 77.0 B

```php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
```

#### `app/Http/Controllers/PatientReportController.php` — 11 lines, 130.0 B

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientReportController extends Controller
{
    //
}
```

#### `app/Http/Controllers/ReportController.php` — 29 lines, 872.0 B

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class ReportController extends Controller
{
    public function patients(Request $request)
    {
        $dateFrom = $request->get('date_from', now()->startOfMonth()->format('Y-m-d'));
        $dateTo = $request->get('date_to', now()->format('Y-m-d'));

        $patients = Patient::with('contract')
            ->whereDate('created_at', '>=', $dateFrom)
            ->whereDate('created_at', '<=', $dateTo)
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $patients->count();
        $male = $patients->where('gender', 'male')->count();
        $female = $patients->where('gender', 'female')->count();

        return view('reports.patients', compact(
            'patients', 'total', 'male', 'female', 'dateFrom', 'dateTo'
        ));
    }
}
```

#### `app/Http/Middleware/CheckRole.php` — 48 lines, 2.2 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف داخل مجلد Middleware طبقاً لمعيار PSR-4
namespace App\Http\Middleware;

// (2) استيراد واجهة Closure لدعم دوال الوسيط
use Closure;

// (3) استيراد واجهة Request لقراءة الطلب القادم من المستخدم
use Illuminate\Http\Request;

// (4) استيراد Response لعرض صفحة الخطأ 403 عند رفض الصلاحية
use Symfony\Component\HttpFoundation\Response;

// (5) تعريف كلاس CheckRole المسؤول عن فحص دور المستخدم
class CheckRole
{
    /**
     * (6) دالة handle(): نقطة دخول الـ Middleware
     *     تُنفَّذ تلقائياً على كل طلب يمر عبر هذا الوسيط
     *
     * @param  Request  $request  الطلب القادم من المتصفح
     * @param  Closure  $next     الدالة التي تمرر الطلب للطبقة التالية
     * @param  string  $role      الدور المطلوب (admin, doctor, receptionist)
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // (7) التحقق من أن المستخدم مسجل دخوله أولاً
        if (!auth()->check()) {
            // (8) إذا لم يكن مسجلاً، توجيهه إلى صفحة تسجيل الدخول
            return redirect()->route('filament.admin.auth.login');
        }

        // (9) قراءة دور المستخدم من حقل role في قاعدة البيانات
        $userRole = auth()->user()->role;

        // (10) فحص ما إذا كان دور المستخدم يطابق الدور المطلوب
        if ($userRole === $role) {
            // (11) الدور متطابق: السماح بمرور الطلب إلى الطبقة التالية
            return $next($request);
        }

        // (12) الدور غير متطابق: عرض صفحة خطأ 403 (ممنوع)
        //      abort(403) يوقف الطلب ويعرض رسالة "غير مصرح لك"
        abort(403, 'غير مصرح لك بالدخول إلى هذه الصفحة.');
    }
}
```

#### `app/Http/Middleware/SetUserLocale.php` — 47 lines, 2.2 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف داخل مجلد Middleware طبقاً لمعيار PSR-4
namespace App\Http\Middleware;

// (2) استيراد واجهة Closure لدعم دوال الوسيط (Middleware)
use Closure;

// (3) استيراد واجهة Request لقراءة الطلب القادم من المستخدم
use Illuminate\Http\Request;

// (4) استيراد فاساد App لتغيير اللغة على مستوى التطبيق بالكامل
use Illuminate\Support\Facades\App;

// (5) تعريف كلاس SetUserLocale المسؤول عن ضبط لغة التطبيق لكل مستخدم
class SetUserLocale
{
    /**
     * (6) دالة handle(): نقطة دخول الـ Middleware
     *     تُنفَّذ تلقائياً على كل طلب يمر عبر هذا الوسيط
     *
     * @param  Request  $request  الطلب القادم من المتصفح
     * @param  Closure  $next     الدالة التي تمرر الطلب للطبقة التالية
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // (7) التحقق من أن المستخدم مسجل دخوله
        //     auth()->user() ترجع null إذا لم يكن مسجلاً
        if (auth()->check()) {

            // (8) قراءة حقل locale من المستخدم المسجل
            //     القيمة ستكون 'ar' أو 'en' (الافتراضي 'ar' كما عرفناه في قاعدة البيانات)
            $locale = auth()->user()->locale;

            // (9) App::setLocale(): تغيير لغة التطبيق بالكامل إلى لغة المستخدم
            //     Laravel سيستخدم ملفات الترجمة من lang/{locale} تلقائياً
            //     إذا كانت 'ar': يستخدم lang/ar/
            //     إذا كانت 'en': يستخدم lang/en/
            App::setLocale($locale);
        }

        // (10) تمرير الطلب إلى الطبقة التالية من Middleware أو إلى التطبيق نفسه
        //     هذا إلزامي: بدونه يتوقف الطلب ولا يكمل
        return $next($request);
    }
}
```

#### `app/Models/Appointment.php` — 64 lines, 1.4 KB

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'room_id',
        'schedule_id',
        'appointment_date',
        'appointment_time',
        'end_time',
        'type',
        'status',
        'is_completed',
        'queue_number',
        'notes',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
            'appointment_time' => 'datetime:H:i',
            'end_time'         => 'datetime:H:i',
            'queue_number'     => 'integer',
            'is_completed'     => 'boolean',
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
```

#### `app/Models/Contract.php` — 42 lines, 1014.0 B

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

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

    // (1) علاقة BelongsTo: كل عقد مرتبط بلائحة أسعار واحدة
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }
}
```

#### `app/Models/Doctor.php` — 54 lines, 1.3 KB

```php
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
```

#### `app/Models/Patient.php` — 50 lines, 1.1 KB

```php
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
```

#### `app/Models/Payment.php` — 61 lines, 1.4 KB

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'appointment_id',
        'contract_id',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'payment_method',
        'status',
        'notes',
        'received_by',
    ];

    protected function casts(): array
    {
        return [
            'total_amount'     => 'decimal:2',
            'paid_amount'      => 'decimal:2',
            'remaining_amount' => 'decimal:2',
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by');
    }

    // (1) علاقة HasMany: دفعة واحدة تحتوي على بنود كثيرة
    public function items(): HasMany
    {
        return $this->hasMany(PaymentItem::class);
    }
}
```

#### `app/Models/PaymentItem.php` — 35 lines, 680.0 B

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'name',
        'category',
        'price',
        'quantity',
        'total',
    ];

    protected function casts(): array
    {
        return [
            'price'    => 'decimal:2',
            'total'    => 'decimal:2',
            'quantity' => 'integer',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
```

#### `app/Models/PriceList.php` — 31 lines, 624.0 B

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    // (1) علاقة One-to-Many: اللائحة تحتوي على بنود
    public function items(): HasMany
    {
        return $this->hasMany(PriceListItem::class);
    }
}
```

#### `app/Models/PriceListItem.php` — 37 lines, 793.0 B

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_list_id',
        'name',
        'category',
        'price',
        'cost',
        'code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price'     => 'decimal:2',
            'cost'      => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    // (1) علاقة BelongsTo: كل بند ينتمي إلى لائحة واحدة
    public function priceList(): BelongsTo
    {
        return $this->belongsTo(PriceList::class);
    }
}
```

#### `app/Models/Room.php` — 33 lines, 828.0 B

```php
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
```

#### `app/Models/Schedule.php` — 66 lines, 1.8 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace App\Models;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// (3) تعريف كلاس Schedule
class Schedule extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'schedule_type',
        'override_date',
        'recurring_days',
        'start_date',
        'end_date',
        'doctor_id',
        'room_id',
        'day_of_week',
        'start_time',
        'end_time',
        'slot_duration',
        'max_patients',
        'is_active',
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'is_active'       => 'boolean',
            'day_of_week'     => 'integer',
            'slot_duration'   => 'integer',
            'max_patients'    => 'integer',
            'start_time'      => 'datetime:H:i',
            'end_time'        => 'datetime:H:i',
            'recurring_days'  => 'array',         // تحويل JSON إلى مصفوفة تلقائياً
            'start_date'      => 'date',
            'end_date'        => 'date',
            'override_date'   => 'date',
        ];
    }

    /**
     * (7) doctor(): علاقة BelongsTo مع الطبيب
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * (8) room(): علاقة BelongsTo مع الغرفة
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
```

#### `app/Models/Specialty.php` — 30 lines, 977.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Models;

// (2) استيراد كلاس Model من نواة Laravel
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// (3) تعريف كلاس Specialty الذي يرث من Model
class Specialty extends Model
{
    // (4) استخدام HasFactory لتوليد بيانات وهمية
    use HasFactory;

    // (5) $fillable: الحقول المسموح تعبئتها جماعياً
    protected $fillable = [
        'name',        // اسم التخصص
        'description', // وصف التخصص
        'is_active',   // هل التخصص مفعّل؟
    ];

    // (6) $casts: تحويل الحقول إلى أنواع البيانات الصحيحة
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',  // تحويل 0/1 إلى true/false
        ];
    }
}
```

#### `app/Models/User.php` — 51 lines, 2.2 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Models;

// (2) استيراد الواجهات والعقود الأساسية من نواة Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// (3) تعريف كلاس User الذي يرث من Authenticatable (وليس Model العادي لأنه مستخدم مصادقة)
class User extends Authenticatable
{
    // (4) استخدام التريتات (Traits) لإضافة وظائف جاهزة:
    //     HasFactory: يسمح بإنشاء بيانات وهمية للاختبار
    //     Notifiable: يسمح بإرسال إشعارات للمستخدم
    use HasFactory, Notifiable;

    /**
     * (5) $fillable: الحقول المسموح تعبئتها جماعياً (Mass Assignment)
     *     هذه قائمة بيضاء للحماية من ثغرات الأمان
     */
    protected $fillable = [
        'name',        // اسم المستخدم
        'email',       // البريد الإلكتروني
        'password',    // كلمة المرور (مشفرة تلقائياً)
        'locale',      // لغة تفضيل المستخدم: ar أو en
        'role',        // دور المستخدم: admin, doctor, receptionist
    ];

    /**
     * (6) $hidden: الحقول المخفية عند تحويل الموديل إلى JSON
     *     تمنع تسرب كلمة المرور ورمز التذكر في استجابات API
     */
    protected $hidden = [
        'password',         // كلمة المرور المشفرة
        'remember_token',   // رمز تذكر الجلسة
    ];

    /**
     * (7) $casts: تحديد نوع البيانات الأصلي لكل حقل
     *     تضمن أن كلمة المرور تُشفر تلقائياً عند الحفظ
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // تحويل تاريخ التحقق إلى كائن DateTime
            'password'          => 'hashed',     // تشفير تلقائي لكلمة المرور عند الحفظ
        ];
    }
}
```

#### `app/Providers/AppServiceProvider.php` — 25 lines, 361.0 B

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
```

#### `app/Providers/Filament/AdminPanelProvider.php` — 82 lines, 3.3 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Providers\Filament;

// (2) استيراد الكلاسات المطلوبة من Filament
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// (3) تعريف كلاس AdminPanelProvider الذي يرث من PanelProvider
class AdminPanelProvider extends PanelProvider
{
    /**
     * (4) دالة panel(): تكوين وإعداد لوحة التحكم الرئيسية
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            // (5) default(): تعيين هذه اللوحة كلوحة افتراضية
            ->default()

            // (6) id('admin'): المعرف الداخلي للوحة
            ->id('admin')

            // (7) path('admin'): مسار URL للوصول إلى لوحة التحكم
            ->path('admin')

            // (8) login(): تفعيل صفحة تسجيل الدخول
            ->login()

            // (9) colors(): تخصيص ألوان واجهة المستخدم
            ->colors([
                'primary' => Color::Blue,
            ])

            // (10) discoverResources(): اكتشاف موارد Filament تلقائياً
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')

            // (11) discoverPages(): اكتشاف الصفحات المخصصة تلقائياً
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')

            // (12) pages(): تسجيل الصفحات الأساسية يدوياً
            ->pages([
                \Filament\Pages\Dashboard::class,
                \App\Filament\Pages\EditProfile::class,
            ])

            // (13) discoverWidgets(): اكتشاف الودجات تلقائياً
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')

            // (14) middleware(): تسجيل طبقات الوسيط الأساسية + Middleware اللغة فقط
            //      بدون CheckRole — الصلاحيات ستُطبق داخل كل Resource على حدة
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \App\Http\Middleware\SetUserLocale::class,
            ])

            // (15) authMiddleware(): طبقة وسيط المصادقة
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
```

### 📂 `routes` (2 files)

#### `routes/console.php` — 9 lines, 210.0 B

```php
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
```

#### `routes/web.php` — 8 lines, 108.0 B

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
```

### 📂 `database/migrations` (25 files)

#### `database/migrations/0001_01_01_000000_create_users_table.php` — 50 lines, 1.4 KB

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
```

#### `database/migrations/0001_01_01_000001_create_cache_table.php` — 36 lines, 849.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
```

#### `database/migrations/0001_01_01_000002_create_jobs_table.php` — 58 lines, 1.8 KB

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
```

#### `database/migrations/2026_07_07_183502_add_locale_to_users_table.php` — 29 lines, 849.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل الهجرة: إضافة عمود locale إلى جدول users
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // إنشاء عمود locale: نصي بطول حرفين، قيمته الافتراضية 'ar' (العربية)
            $table->string('locale', 2)->default('ar')->after('password');
        });
    }

    /**
     * التراجع عن الهجرة: حذف عمود locale من جدول users
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('locale');
        });
    }
};
```

#### `database/migrations/2026_07_07_183813_add_role_to_users_table.php` — 29 lines, 901.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل الهجرة: إضافة عمود role إلى جدول users
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // إنشاء عمود role: enum (قائمة محددة) بـ 3 أدوار فقط، القيمة الافتراضية 'receptionist'
            $table->enum('role', ['admin', 'doctor', 'receptionist'])->default('receptionist')->after('locale');
        });
    }

    /**
     * التراجع عن الهجرة: حذف عمود role من جدول users
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
```

#### `database/migrations/2026_07_07_194006_create_patients_table.php` — 60 lines, 2.1 KB

```php

<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): تُنفَّذ عند تشغيل php artisan migrate
     */
    public function up(): void
    {
        // (4) Schema::create: إنشاء جدول patients
        Schema::create('patients', function (Blueprint $table) {

            // (5) id(): مفتاح أساسي تلقائي التزايد
            $table->id();

            // (6) first_name: الاسم الأول - مطلوب
            $table->string('first_name', 100);

            // (7) last_name: الاسم الأخير - مطلوب
            $table->string('last_name', 100);

            // (8) phone: رقم الهاتف - اختياري، فريد
            $table->string('phone', 20)->nullable()->unique();

            // (9) date_of_birth: تاريخ الميلاد - مطلوب
            $table->date('date_of_birth');

            // (10) gender: الجنس - مطلوب ومحصور
            $table->enum('gender', ['male', 'female']);

            // (11) address: العنوان - اختياري، نص طويل
            $table->text('address')->nullable();

            // (12) medical_history: التاريخ المرضي - اختياري، نص طويل
            $table->text('medical_history')->nullable();

            // (13) national_id: الرقم القومي - اختياري، 14 رقم، فريد
            $table->string('national_id', 14)->nullable()->unique();

            // (14) created_at و updated_at: وقت الإنشاء والتحديث
            $table->timestamps();
        });
    }

    /**
     * (15) دالة down(): تُنفَّذ عند تشغيل php artisan migrate:rollback
     */
    public function down(): void
    {
        // (16) حذف جدول patients بالكامل
        Schema::dropIfExists('patients');
    }
};
```

#### `database/migrations/2026_07_07_200028_create_specialties_table.php` — 42 lines, 1.3 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول specialties
     */
    public function up(): void
    {
        Schema::create('specialties', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) name: اسم التخصص - مطلوب وفريد (باطنة، أطفال، عظام...)
            $table->string('name', 100)->unique();

            // (6) description: وصف التخصص - اختياري
            $table->text('description')->nullable();

            // (7) is_active: هل التخصص مفعّل؟ (لإخفاء التخصصات القديمة بدل حذفها)
            $table->boolean('is_active')->default(true);

            // (8) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (9) دالة down(): حذف جدول specialties
     */
    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};
```

#### `database/migrations/2026_07_07_200949_create_doctors_table.php` — 60 lines, 2.0 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول doctors
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) first_name: الاسم الأول للطبيب - مطلوب
            $table->string('first_name', 100);

            // (6) last_name: الاسم الأخير للطبيب - مطلوب
            $table->string('last_name', 100);

            // (7) phone: رقم هاتف الطبيب - اختياري
            $table->string('phone', 20)->nullable();

            // (8) email: بريد إلكتروني - فريد
            $table->string('email', 100)->unique();

            // (9) license_number: رقم الترخيص الطبي - فريد
            $table->string('license_number', 50)->unique();

            // (10) years_of_experience: عدد سنوات الخبرة
            $table->unsignedTinyInteger('years_of_experience')->default(0);

            // (11) consultation_fee: رسم الكشف
            $table->decimal('consultation_fee', 10, 2)->default(0);

            // (12) is_active: هل الطبيب مفعّل؟
            $table->boolean('is_active')->default(true);

            // (13) user_id: ربط الطبيب بجدول users (للدخول للوحة التحكم)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // (14) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (15) دالة down(): حذف جدول doctors
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
```

#### `database/migrations/2026_07_07_201059_create_doctor_specialty_table.php` — 39 lines, 1.3 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء الجدول الوسيط doctor_specialty
     */
    public function up(): void
    {
        Schema::create('doctor_specialty', function (Blueprint $table) {

            // (4) doctor_id: مفتاح خارجي يشير إلى جدول doctors
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();

            // (5) specialty_id: مفتاح خارجي يشير إلى جدول specialties
            $table->foreignId('specialty_id')->constrained()->cascadeOnDelete();

            // (6) المفتاح الأساسي مركب من العمودين (يمنع تكرار نفس العلاقة)
            $table->primary(['doctor_id', 'specialty_id']);

            // (7) timestamps: وقت إنشاء وتحديث العلاقة
            $table->timestamps();
        });
    }

    /**
     * (8) دالة down(): حذف الجدول الوسيط
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_specialty');
    }
};
```

#### `database/migrations/2026_07_07_202841_create_rooms_table.php` — 51 lines, 1.6 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول rooms
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) name: اسم الغرفة - مطلوب (مثال: غرفة 101، عيادة أ)
            $table->string('name', 50);

            // (6) floor: الطابق - اختياري
            $table->string('floor', 20)->nullable();

            // (7) building: المبنى - اختياري (إذا كانت العيادة كبيرة)
            $table->string('building', 50)->nullable();

            // (8) type: نوع الغرفة - كشف، عمليات، طوارئ...
            $table->string('type', 50)->default('examination');

            // (9) is_active: هل الغرفة مفعّلة؟
            $table->boolean('is_active')->default(true);

            // (10) notes: ملاحظات إضافية
            $table->text('notes')->nullable();

            // (11) timestamps: created_at و updated_at
            $table->timestamps();
        });
    }

    /**
     * (12) دالة down(): حذف جدول rooms
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
```

#### `database/migrations/2026_07_07_203941_create_schedules_table.php` — 60 lines, 2.2 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول schedules
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) doctor_id: الطبيب المرتبط بهذا الجدول
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();

            // (6) room_id: الغرفة التي يعمل بها الطبيب في هذا اليوم (قد تتغير يومياً)
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();

            // (7) day_of_week: اليوم (0=أحد, 1=إثنين, ..., 6=سبت)
            $table->unsignedTinyInteger('day_of_week');

            // (8) start_time: وقت بدء العمل
            $table->time('start_time');

            // (9) end_time: وقت انتهاء العمل
            $table->time('end_time');

            // (10) slot_duration: مدة الكشف بالدقائق (15، 20، 30)
            $table->unsignedTinyInteger('slot_duration')->default(15);

            // (11) max_patients: الحد الأقصى للمرضى في هذا اليوم (اختياري)
            $table->unsignedTinyInteger('max_patients')->nullable();

            // (12) is_active: هل هذا الجدول مفعّل؟
            $table->boolean('is_active')->default(true);

            // (13) timestamps: created_at و updated_at
            $table->timestamps();

            // (14) unique: منع تكرار نفس الطبيب + اليوم (طبيب واحد له جدول واحد في اليوم)
            $table->unique(['doctor_id', 'day_of_week']);
        });
    }

    /**
     * (15) دالة down(): حذف جدول schedules
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
```

#### `database/migrations/2026_07_07_205306_create_appointments_table.php` — 75 lines, 2.9 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إنشاء جدول appointments
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {

            // (4) id(): مفتاح أساسي تلقائي
            $table->id();

            // (5) patient_id: المريض (مطلوب)
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

            // (6) doctor_id: الطبيب (مطلوب)
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();

            // (7) room_id: الغرفة (اختياري — يمكن تحديدها لاحقاً)
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();

            // (8) schedule_id: جدول الطبيب المرتبط بهذا الموعد (اختياري)
            $table->foreignId('schedule_id')->nullable()->constrained()->nullOnDelete();

            // (9) appointment_date: تاريخ الموعد (YYYY-MM-DD)
            $table->date('appointment_date');

            // (10) appointment_time: وقت الموعد (HH:MM)
            $table->time('appointment_time');

            // (11) end_time: وقت انتهاء الموعد (بداية + مدة الكشف)
            $table->time('end_time');

            // (12) type: نوع الموعد — scheduled (محجوز) أو walk_in (حضور مباشر)
            $table->enum('type', ['scheduled', 'walk_in'])->default('scheduled');

            // (13) status: حالة الموعد
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled', 'no_show'])
                ->default('pending');

            // (14) queue_number: رقم الدور (للمواعيد الحضور المباشر)
            $table->unsignedTinyInteger('queue_number')->nullable();

            // (15) notes: ملاحظات إضافية
            $table->text('notes')->nullable();

            // (16) created_by: المستخدم الذي أنشأ الموعد (موظف الاستقبال)
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            // (17) timestamps: created_at و updated_at
            $table->timestamps();

            // (18) فهارس لتحسين أداء البحث
            $table->index('appointment_date');
            $table->index('status');
            $table->index('type');
        });
    }

    /**
     * (19) دالة down(): حذف جدول appointments
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
```

#### `database/migrations/2026_07_08_190658_add_schedule_type_to_schedules_table.php` — 60 lines, 2.7 KB

```php
<?php

// (1) استيراد الكلاسات الهندسية اللازمة من نواة Laravel
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// (2) استخدام كلاس مجهول لمنع تعارض التسمية
return new class extends Migration
{
    /**
     * (3) دالة up(): إضافة أعمدة جديدة لجدول schedules
     *     schedule_type: نوع الجدول (دوري أو استثنائي)
     *     override_date: تاريخ الجدول الاستثنائي (للمرات الواحدة)
     *     recurring_days: أيام الأسبوع للجدول الدوري (مخزنة كـ JSON)
     *     start_date / end_date: نطاق تواريخ الجدول الدوري (اختياري)
     */
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            
            // (4) schedule_type: دوري (recurring) أو استثنائي (override)
            //     default: 'recurring' — معظم الجداول دورية
            $table->string('schedule_type', 20)->default('recurring')->after('id');
            
            // (5) override_date: تاريخ محدد للجدول الاستثنائي (YYYY-MM-DD)
            //     nullable: الجداول الدورية لا تحتاج هذا الحقل
            $table->date('override_date')->nullable()->after('schedule_type');
            
            // (6) recurring_days: مصفوفة أيام الأسبوع للجدول الدوري
            //     مثال: [0,2,4] = أحد وثلاثاء وخميس
            //     nullable: الجداول الاستثنائية لا تحتاج هذا الحقل
            $table->json('recurring_days')->nullable()->after('override_date');
            
            // (7) start_date: تاريخ بدء سريان الجدول الدوري
            //     nullable: إذا لم يحدد، يبدأ من الآن
            $table->date('start_date')->nullable()->after('recurring_days');
            
            // (8) end_date: تاريخ انتهاء سريان الجدول الدوري
            //     nullable: إذا لم يحدد، يستمر للأبد
            $table->date('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * (9) دالة down(): حذف الأعمدة المضافة عند التراجع
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn([
                'schedule_type',
                'override_date',
                'recurring_days',
                'start_date',
                'end_date',
            ]);
        });
    }
};
```

#### `database/migrations/2026_07_08_191431_make_day_of_week_nullable_in_schedules.php` — 22 lines, 578.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedTinyInteger('day_of_week')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedTinyInteger('day_of_week')->nullable(false)->change();
        });
    }
};
```

#### `database/migrations/2026_07_08_200225_make_end_time_nullable_in_appointments.php` — 22 lines, 548.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->time('end_time')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->time('end_time')->nullable(false)->change();
        });
    }
};
```

#### `database/migrations/2026_07_09_180554_add_is_completed_to_appointments.php` — 23 lines, 605.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // (1) is_completed: هل تم الكشف؟
            $table->boolean('is_completed')->default(false)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('is_completed');
        });
    }
};
```

#### `database/migrations/2026_07_09_220848_create_price_lists_table.php` — 31 lines, 838.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();

            // (1) name: اسم اللائحة (مثال: "أسعار نقدي 2026"، "أسعار التأمين")
            $table->string('name', 100);

            // (2) description: وصف اختياري
            $table->text('description')->nullable();

            // (3) is_active: هل اللائحة مفعّلة؟
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_lists');
    }
};
```

#### `database/migrations/2026_07_09_221120_create_price_list_items_table.php` — 43 lines, 1.4 KB

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_list_items', function (Blueprint $table) {
            $table->id();

            // (1) price_list_id: اللائحة الأم
            $table->foreignId('price_list_id')->constrained()->cascadeOnDelete();

            // (2) name: اسم الخدمة أو الصنف
            $table->string('name', 200);

            // (3) category: تصنيف الخدمة (دواء، مستلزم، تحليل، أشعة، خدمة طبية)
            $table->enum('category', ['medicine', 'supply', 'lab', 'radiology', 'service']);

            // (4) price: سعر البيع للمريض
            $table->decimal('price', 10, 2);

            // (5) cost: سعر التكلفة على العيادة (اختياري)
            $table->decimal('cost', 10, 2)->nullable();

            // (6) code: كود داخلي للصنف (اختياري)
            $table->string('code', 50)->nullable();

            // (7) is_active: هل الصنف مفعّل؟
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_list_items');
    }
};
```

#### `database/migrations/2026_07_09_223216_create_contracts_table.php` — 52 lines, 1.8 KB

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // (1) name: اسم العقد (مثال: "تعاقد شركة الأمل للتأمين")
            $table->string('name', 100);

            // (2) price_list_id: اللائحة المرتبطة بالعقد
            $table->foreignId('price_list_id')->constrained()->cascadeOnDelete();

            // (3) organization_name: اسم الجهة (شركة تأمين، شركة تعاقد)
            $table->string('organization_name', 100);

            // (4) contract_type: نوع العقد
            $table->enum('contract_type', ['insurance', 'corporate'])->default('insurance');

            // (5) start_date: تاريخ بداية العقد
            $table->date('start_date');

            // (6) end_date: تاريخ نهاية العقد
            $table->date('end_date');

            // (7) copay_percentage: نسبة تحمل المريض (مثال: 10 يعني المريض يدفع 10%)
            $table->unsignedTinyInteger('copay_percentage')->default(0);

            // (8) discount_percentage: نسبة الخصم على اللائحة (اختياري)
            $table->unsignedTinyInteger('discount_percentage')->default(0);

            // (9) notes: ملاحظات
            $table->text('notes')->nullable();

            // (10) is_active: هل العقد مفعّل؟
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
```

#### `database/migrations/2026_07_09_224247_add_contract_id_to_patients.php` — 24 lines, 713.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // (1) contract_id: العقد المرتبط بالمريض (اختياري)
            $table->foreignId('contract_id')->nullable()->after('national_id')->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
            $table->dropColumn('contract_id');
        });
    }
};
```

#### `database/migrations/2026_07_09_225735_remove_unique_from_phone_in_patients.php` — 23 lines, 577.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // إزالة القيد الفريد من حقل phone
            $table->dropUnique('patients_phone_unique');
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->unique('phone');
        });
    }
};
```

#### `database/migrations/2026_07_09_230042_remove_unique_from_phone_in_patients.php` — 29 lines, 536.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
};
```

#### `database/migrations/2026_07_09_231035_update_contract_type_enum.php` — 29 lines, 538.0 B

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            //
        });
    }
};
```

#### `database/migrations/2026_07_09_232129_create_payments_table.php` — 52 lines, 1.8 KB

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // (1) patient_id: المريض
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();

            // (2) appointment_id: الموعد المرتبط (اختياري)
            $table->foreignId('appointment_id')->nullable()->constrained()->nullOnDelete();

            // (3) contract_id: العقد المستخدم
            $table->foreignId('contract_id')->nullable()->constrained()->nullOnDelete();

            // (4) total_amount: المبلغ الإجمالي
            $table->decimal('total_amount', 10, 2);

            // (5) paid_amount: المبلغ المدفوع
            $table->decimal('paid_amount', 10, 2);

            // (6) remaining_amount: المبلغ المتبقي
            $table->decimal('remaining_amount', 10, 2)->default(0);

            // (7) payment_method: طريقة الدفع (نقدي، بطاقة، تأمين، تعاقد)
            $table->string('payment_method', 50)->default('cash');

            // (8) status: حالة الدفع
            $table->enum('status', ['pending', 'paid', 'partial'])->default('pending');

            // (9) notes: ملاحظات
            $table->text('notes')->nullable();

            // (10) received_by: المستخدم الذي استلم الدفع
            $table->foreignId('received_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
```

#### `database/migrations/2026_07_09_233637_create_payment_items_table.php` — 40 lines, 1.1 KB

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_items', function (Blueprint $table) {
            $table->id();

            // (1) payment_id: الدفعة الأم
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();

            // (2) name: اسم الخدمة
            $table->string('name', 200);

            // (3) category: تصنيف الخدمة
            $table->string('category', 50);

            // (4) price: سعر الوحدة
            $table->decimal('price', 10, 2);

            // (5) quantity: الكمية (افتراضي 1)
            $table->unsignedTinyInteger('quantity')->default(1);

            // (6) total: الإجمالي = السعر × الكمية
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_items');
    }
};
```

### 📂 `database/seeders` (10 files)

#### `database/seeders/AppointmentSeeder.php` — 20 lines, 464.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Appointment;

// (3) تعريف كلاس AppointmentSeeder
class AppointmentSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 500 موعد وهمي
     */
    public function run(): void
    {
        Appointment::factory(500)->create();
    }
}
```

#### `database/seeders/ContractSeeder.php` — 41 lines, 1.4 KB

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use App\Models\PriceList;

class ContractSeeder extends Seeder
{
    public function run(): void
    {
        $priceList = PriceList::where('name', 'أسعار نقدي 2026')->first();

        if ($priceList) {
            Contract::create([
                'name'                => 'تعاقد شركة ميديكال للتأمين',
                'price_list_id'       => $priceList->id,
                'organization_name'   => 'شركة ميديكال للتأمين',
                'contract_type'       => 'insurance',
                'start_date'          => '2026-01-01',
                'end_date'            => '2026-12-31',
                'copay_percentage'    => 10,
                'discount_percentage' => 0,
                'is_active'           => true,
            ]);

            Contract::create([
                'name'                => 'تعاقد شركة الأمل للبترول',
                'price_list_id'       => $priceList->id,
                'organization_name'   => 'شركة الأمل للبترول',
                'contract_type'       => 'corporate',
                'start_date'          => '2026-01-01',
                'end_date'            => '2026-06-30',
                'copay_percentage'    => 0,
                'discount_percentage' => 15,
                'is_active'           => true,
            ]);
        }
    }
}
```

#### `database/seeders/DatabaseSeeder.php` — 23 lines, 495.0 B

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SpecialtySeeder::class,
            RoomSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            ScheduleSeeder::class,
            AppointmentSeeder::class,
            PriceListSeeder::class,
            ContractSeeder::class,
        ]);
    }
}
```

#### `database/seeders/DoctorSeeder.php` — 30 lines, 879.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Specialty;

// (3) تعريف كلاس DoctorSeeder
class DoctorSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 50 طبيباً مع تخصصات
     */
    public function run(): void
    {
        // (5) جلب جميع التخصصات
        $specialties = Specialty::all();

        // (6) إنشاء 50 طبيباً
        Doctor::factory(50)->create()->each(function ($doctor) use ($specialties) {

            // (7) ربط كل طبيب بـ 1-3 تخصصات عشوائية
            $randomSpecialties = $specialties->random(rand(1, 3));
            $doctor->specialties()->attach($randomSpecialties);
        });
    }
}
```

#### `database/seeders/PatientSeeder.php` — 20 lines, 448.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Patient;

// (3) تعريف كلاس PatientSeeder
class PatientSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 200 مريض وهمي
     */
    public function run(): void
    {
        Patient::factory(200)->create();
    }
}
```

#### `database/seeders/PriceListSeeder.php` — 43 lines, 2.5 KB

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PriceList;
use App\Models\PriceListItem;

class PriceListSeeder extends Seeder
{
    public function run(): void
    {
        // (1) إنشاء لائحة "أسعار نقدي 2026"
        $cashList = PriceList::create([
            'name'        => 'أسعار نقدي 2026',
            'description' => 'لائحة الأسعار النقدية الأساسية',
            'is_active'   => true,
        ]);

        // (2) بنود اللائحة النقدية
        $cashItems = [
            ['name' => 'كشف طبيب عام',           'category' => 'service',    'price' => 150,  'cost' => 0],
            ['name' => 'كشف أخصائي',              'category' => 'service',    'price' => 250,  'cost' => 0],
            ['name' => 'كشف استشاري',             'category' => 'service',    'price' => 350,  'cost' => 0],
            ['name' => 'تحليل صورة دم كاملة',     'category' => 'lab',        'price' => 120,  'cost' => 60],
            ['name' => 'تحليل سكر',               'category' => 'lab',        'price' => 50,   'cost' => 25],
            ['name' => 'تحليل بول',               'category' => 'lab',        'price' => 40,   'cost' => 20],
            ['name' => 'أشعة عادية',              'category' => 'radiology',  'price' => 200,  'cost' => 100],
            ['name' => 'أشعة مقطعية',             'category' => 'radiology',  'price' => 800,  'cost' => 500],
            ['name' => 'جلسة علاج طبيعي',         'category' => 'service',    'price' => 100,  'cost' => 0],
            ['name' => 'إزالة جبس',               'category' => 'service',    'price' => 80,   'cost' => 0],
            ['name' => 'باراسيتامول 500mg',       'category' => 'medicine',   'price' => 15,   'cost' => 8],
            ['name' => 'أموكسيسيلين 500mg',       'category' => 'medicine',   'price' => 45,   'cost' => 30],
            ['name' => 'حقنة كورتيزون',           'category' => 'medicine',   'price' => 60,   'cost' => 35],
            ['name' => 'سرنجة 5ml',               'category' => 'supply',     'price' => 5,    'cost' => 2],
            ['name' => 'شاش طبي',                 'category' => 'supply',     'price' => 10,   'cost' => 5],
        ];

        foreach ($cashItems as $item) {
            PriceListItem::create(array_merge($item, ['price_list_id' => $cashList->id]));
        }
    }
}
```

#### `database/seeders/RoomSeeder.php` — 20 lines, 436.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Room;

// (3) تعريف كلاس RoomSeeder
class RoomSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 30 غرفة وهمية
     */
    public function run(): void
    {
        Room::factory(30)->create();
    }
}
```

#### `database/seeders/ScheduleSeeder.php` — 34 lines, 950.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Doctor;

// (3) تعريف كلاس ScheduleSeeder
class ScheduleSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء جداول لجميع الأطباء
     */
    public function run(): void
    {
        // (5) جلب جميع الأطباء
        $doctors = Doctor::all();

        // (6) لكل طبيب: إنشاء 4-6 أيام عمل
        foreach ($doctors as $doctor) {
            $days = fake()->randomElements([0, 1, 2, 3, 4, 5, 6], fake()->numberBetween(4, 6));

            foreach ($days as $day) {
                Schedule::factory()->create([
                    'doctor_id'   => $doctor->id,
                    'day_of_week' => $day,
                ]);
            }
        }
    }
}
```

#### `database/seeders/SpecialtySeeder.php` — 21 lines, 529.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\Specialty;

// (3) تعريف كلاس SpecialtySeeder
class SpecialtySeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء 15 تخصصاً وهمياً
     */
    public function run(): void
    {
        // (5) إنشاء 15 تخصصاً باستخدام Factory
        Specialty::factory(15)->create();
    }
}
```

#### `database/seeders/UserSeeder.php` — 29 lines, 841.0 B

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Seeders;

// (2) استيراد الكلاسات المطلوبة
use Illuminate\Database\Seeder;
use App\Models\User;

// (3) تعريف كلاس UserSeeder
class UserSeeder extends Seeder
{
    /**
     * (4) دالة run(): إنشاء مستخدم Admin افتراضي
     */
    public function run(): void
    {
        // (5) firstOrCreate: ينشئ المستخدم إذا لم يكن موجوداً
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Mohammad Sanad',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),  // تشفير صحيح
                'role'     => 'admin',
                'locale'   => 'ar',
            ]
        );
    }
}
```

### 📂 `database/factories` (7 files)

#### `database/factories/AppointmentFactory.php` — 87 lines, 3.2 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس AppointmentFactory
class AppointmentFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Appointment
    protected $model = Appointment::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية للمواعيد
     */
    public function definition(): array
    {
        // (6) اختيار طبيب عشوائي
        $doctor = Doctor::inRandomOrder()->first();

        // (7) تاريخ عشوائي في الأسبوع القادم
        $appointmentDate = fake()->dateTimeBetween('now', '+7 days')->format('Y-m-d');

        // (8) وقت عشوائي بين 9 صباحاً و 5 مساءً
        $hour = fake()->numberBetween(9, 17);
        $minute = fake()->randomElement([0, 15, 30, 45]);
        $appointmentTime = sprintf('%02d:%02d', $hour, $minute);

        // (9) مدة الكشف الافتراضية (سنأخذها من جدول الطبيب إن وجد)
        $slotDuration = 15;

        // (10) وقت الانتهاء = وقت البداية + مدة الكشف
        $endTime = date('H:i', strtotime($appointmentTime . " +{$slotDuration} minutes"));

        // (11) الحالة: عشوائية
        $status = fake()->randomElement(['pending', 'confirmed', 'completed', 'cancelled', 'no_show']);

        return [
            // (12) patient_id: مريض عشوائي
            'patient_id' => Patient::inRandomOrder()->first()->id,

            // (13) doctor_id: الطبيب المختار
            'doctor_id' => $doctor->id,

            // (14) room_id: غرفة عشوائية (70% احتمال)
            'room_id' => fake()->boolean(70) ? Room::inRandomOrder()->first()->id : null,

            // (15) schedule_id: null حالياً
            'schedule_id' => null,

            // (16) appointment_date: التاريخ المختار
            'appointment_date' => $appointmentDate,

            // (17) appointment_time: الوقت المختار
            'appointment_time' => $appointmentTime,

            // (18) end_time: وقت الانتهاء
            'end_time' => $endTime,

            // (19) type: 80% محجوز مسبقاً، 20% حضور مباشر
            'type' => fake()->randomElement(['scheduled', 'scheduled', 'scheduled', 'scheduled', 'walk_in']),

            // (20) status: الحالة
            'status' => $status,

            // (21) queue_number: رقم الدور (للحضور المباشر فقط)
            'queue_number' => function ($attributes) {
                return $attributes['type'] === 'walk_in'
                    ? fake()->numberBetween(1, 20)
                    : null;
            },

            // (22) notes: ملاحظات (30% احتمال)
            'notes' => fake()->boolean(30) ? fake()->sentence() : null,

            // (23) created_by: موظف الاستقبال Admin
            'created_by' => User::where('role', 'admin')->first()?->id,
        ];
    }
}
```

#### `database/factories/DoctorFactory.php` — 50 lines, 1.8 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس DoctorFactory
class DoctorFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Doctor
    protected $model = Doctor::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية للطبيب
     */
    public function definition(): array
    {
        return [
            // (6) first_name: اسم أول عشوائي
            'first_name' => fake()->firstName(),

            // (7) last_name: اسم أخير عشوائي
            'last_name' => fake()->lastName(),

            // (8) phone: رقم هاتف مصري عشوائي
            'phone' => '01' . fake()->numberBetween(0, 2) . fake()->numberBetween(0, 5) . fake()->numerify('########'),

            // (9) email: بريد إلكتروني فريد
            'email' => fake()->unique()->safeEmail(),

            // (10) license_number: رقم ترخيص عشوائي (حروف + أرقام)
            'license_number' => 'LIC-' . fake()->unique()->numerify('######'),

            // (11) years_of_experience: سنوات خبرة بين 1 و 35
            'years_of_experience' => fake()->numberBetween(1, 35),

            // (12) consultation_fee: رسم كشف بين 100 و 500 جنيه
            'consultation_fee' => fake()->randomFloat(2, 100, 500),

            // (13) is_active: 90% من الأطباء مفعّلين
            'is_active' => fake()->boolean(90),

            // (14) user_id: null حالياً (سنربطهم بحسابات لاحقاً)
            'user_id' => null,
        ];
    }
}
```

#### `database/factories/PatientFactory.php` — 57 lines, 2.4 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace Database\Factories;

// (2) استيراد الموديل المرتبط بهذا الـ Factory
use App\Models\Patient;

// (3) استيراد الكلاس الأساسي لـ Factory من Laravel
use Illuminate\Database\Eloquent\Factories\Factory;

// (4) استيراد Carbon لتوليد تواريخ عشوائية
use Illuminate\Support\Carbon;

/**
 * (5) تعريف كلاس PatientFactory المسؤول عن توليد بيانات وهمية للمرضى
 */
class PatientFactory extends Factory
{
    // (6) $model: ربط الـ Factory بموديل Patient
    protected $model = Patient::class;

    /**
     * (7) دالة definition(): تعريف الشكل الافتراضي للبيانات الوهمية
     *     Faker يُستخدم لتوليد قيم عشوائية بالعربية
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // (8) first_name: اسم أول عشوائي بالعربية (ذكر أو أنثى)
            'first_name' => fake()->firstName(),

            // (9) last_name: اسم أخير عشوائي بالعربية
            'last_name' => fake()->lastName(),

            // (10) phone: رقم هاتف مصري عشوائي (01xxxxxxxxx)
            'phone' => '01' . fake()->numberBetween(0, 2) . fake()->numberBetween(0, 5) . fake()->numerify('########'),

            // (11) date_of_birth: تاريخ ميلاد عشوائي بين 1950 و 2020
            'date_of_birth' => fake()->dateTimeBetween('-70 years', '-5 years')->format('Y-m-d'),

            // (12) gender: جنس عشوائي (ذكر أو أنثى)
            'gender' => fake()->randomElement(['male', 'female']),

            // (13) address: عنوان عشوائي بالعربية (اختياري - 70% من المرضى لهم عنوان)
            'address' => fake()->boolean(70) ? fake()->address() : null,

            // (14) medical_history: تاريخ مرضي عشوائي (اختياري - 50% لهم تاريخ مرضي)
            'medical_history' => fake()->boolean(50) ? fake()->paragraph() : null,

            // (15) national_id: رقم قومي عشوائي 14 رقم (اختياري - 80% لهم رقم قومي)
            'national_id' => fake()->boolean(80) ? fake()->numerify('##############') : null,
        ];
    }
}
```

#### `database/factories/RoomFactory.php` — 41 lines, 1.4 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس RoomFactory
class RoomFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Room
    protected $model = Room::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية للغرف
     */
    public function definition(): array
    {
        return [
            // (6) name: اسم الغرفة (غرفة + رقم عشوائي)
            'name' => 'غرفة ' . fake()->numberBetween(100, 500),

            // (7) floor: الطابق (دور + رقم)
            'floor' => 'الدور ' . fake()->randomElement(['الأول', 'الثاني', 'الثالث', 'الرابع']),

            // (8) building: المبنى
            'building' => 'مبنى ' . fake()->randomElement(['أ', 'ب', 'ج']),

            // (9) type: نوع الغرفة
            'type' => fake()->randomElement(['examination', 'examination', 'examination', 'procedure', 'emergency']),

            // (10) is_active: 90% من الغرف مفعّلة
            'is_active' => fake()->boolean(90),

            // (11) notes: ملاحظات عشوائية (50% احتمال)
            'notes' => fake()->boolean(50) ? fake()->sentence() : null,
        ];
    }
}
```

#### `database/factories/ScheduleFactory.php` — 59 lines, 2.2 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الكلاسات المطلوبة
use App\Models\Schedule;
use App\Models\Doctor;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس ScheduleFactory
class ScheduleFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Schedule
    protected $model = Schedule::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية لجداول الأطباء
     */
    public function definition(): array
    {
        // (6) قائمة أوقات البدء المحتملة (صباحية ومسائية)
        $startTimes = ['08:00', '09:00', '10:00', '14:00', '16:00'];

        // (7) اختيار وقت بدء عشوائي
        $startTime = fake()->randomElement($startTimes);

        // (8) حساب وقت الانتهاء: وقت البدء + عدد ساعات عشوائي (4 إلى 8 ساعات)
        $hoursToAdd = fake()->numberBetween(4, 8);
        $endTime = date('H:i', strtotime($startTime . " +{$hoursToAdd} hours"));

        return [
            // (9) doctor_id: اختيار طبيب عشوائي من الموجودين
            'doctor_id' => Doctor::inRandomOrder()->first()->id,

            // (10) room_id: اختيار غرفة عشوائية (أو null)
            'room_id' => fake()->boolean(80) ? Room::inRandomOrder()->first()->id : null,

            // (11) day_of_week: يوم عشوائي (0=أحد إلى 6=سبت)
            'day_of_week' => fake()->numberBetween(0, 6),

            // (12) start_time: وقت البدء
            'start_time' => $startTime,

            // (13) end_time: وقت الانتهاء المحسوب
            'end_time' => $endTime,

            // (14) slot_duration: مدة الكشف (15، 20، أو 30 دقيقة)
            'slot_duration' => fake()->randomElement([15, 20, 30]),

            // (15) max_patients: حد أقصى للمرضى (اختياري)
            'max_patients' => fake()->boolean(50) ? fake()->numberBetween(10, 40) : null,

            // (16) is_active: 90% من الجداول مفعّلة
            'is_active' => fake()->boolean(90),
        ];
    }
}
```

#### `database/factories/SpecialtyFactory.php` — 48 lines, 1.5 KB

```php
<?php

// (1) تحديد المسار التنظيمي للملف
namespace Database\Factories;

// (2) استيراد الموديل المرتبط
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

// (3) تعريف كلاس SpecialtyFactory
class SpecialtyFactory extends Factory
{
    // (4) ربط الـ Factory بموديل Specialty
    protected $model = Specialty::class;

    /**
     * (5) دالة definition(): تعريف البيانات الوهمية
     */
    public function definition(): array
    {
        return [
            // (6) name: اختيار اسم تخصص عشوائي من قائمة التخصصات الطبية الشائعة
            'name' => fake()->unique()->randomElement([
                'باطنة',
                'أطفال',
                'جراحة عامة',
                'عظام',
                'نساء وتوليد',
                'قلب وأوعية دموية',
                'جلدية',
                'عيون',
                'أنف وأذن وحنجرة',
                'مسالك بولية',
                'مخ وأعصاب',
                'نفسية',
                'أشعة',
                'تخدير',
                'علاج طبيعي',
            ]),

            // (7) description: وصف عشوائي للتخصص
            'description' => fake()->sentence(),

            // (8) is_active: 90% من التخصصات مفعّلة
            'is_active' => fake()->boolean(90),
        ];
    }
}
```

#### `database/factories/UserFactory.php` — 45 lines, 1.0 KB

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
```

### 📂 `resources/views` (4 files)

#### `resources/views/filament/pages/edit-profile.blade.php` — 16 lines, 699.0 B

```php
{{-- (1) استيراد مكونات Filament لبناء صفحة متوافقة مع شكل لوحة التحكم --}}
<x-filament-panels::page>

    {{-- (2) عرض النموذج الذي عرفناه في EditProfile.php --}}
    {{ $this->form }}

    {{-- (3) زر الحفظ أسفل النموذج --}}
    {{--     x-filament::button: زر بتصميم Filament الرسمي --}}
    {{--     wire:click="submit": يستدعي دالة submit() في الكلاس عند الضغط --}}
    <div class="mt-6">
        <x-filament::button wire:click="submit" color="primary" size="lg">
            حفظ التغييرات
        </x-filament::button>
    </div>

</x-filament-panels::page>
```

#### `resources/views/filament/resources/payment-resource/pages/view-invoice.blade.php` — 160 lines, 8.4 KB

```php
<div style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; border: 1px solid #ddd;" id="invoice-print">

    {{-- (1) ترويسة الفاتورة --}}
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">عيادة SanadCare</h2>
        <p style="margin: 5px 0;">نظام إدارة العيادات المتكامل</p>
        <hr>
    </div>

    {{-- (2) معلومات الفاتورة والمريض --}}
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <div>
            <strong>فاتورة رقم:</strong> {{ $this->payment->id }}<br>
            <strong>التاريخ:</strong> {{ $this->payment->created_at->format('Y-m-d') }}<br>
            <strong>الموعد:</strong> {{ $this->payment->created_at->format('H:i') }}
        </div>
        <div style="text-align: right;">
            <strong>المريض:</strong> {{ $this->payment->patient?->first_name }} {{ $this->payment->patient?->last_name }}<br>
            <strong>العقد:</strong> {{ $this->payment->contract?->name }}<br>
            <strong>الطبيب:</strong> {{ $this->payment->appointment?->doctor?->first_name }} {{ $this->payment->appointment?->doctor?->last_name }}
        </div>
    </div>

    <hr>

    {{-- (3) جدول الخدمات حسب التصنيف --}}
    @php
        $items = $this->payment->items;
        $services = $items->where('category', 'service');
        $supplies = $items->where('category', 'supply');
        $medicines = $items->where('category', 'medicine');
        $labs = $items->where('category', 'lab');
        $radiologies = $items->where('category', 'radiology');
    @endphp

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background: #f5f5f5;">
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">#</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">الخدمة</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">التصنيف</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">السعر</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp

            {{-- خدمات طبية --}}
            @if($services->count())
                <tr><td colspan="4" style="background: #e8f5e9; padding: 8px; font-weight: bold;">الخدمات الطبية</td></tr>
                @foreach($services as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">خدمة طبية</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- تحاليل --}}
            @if($labs->count())
                <tr><td colspan="4" style="background: #e3f2fd; padding: 8px; font-weight: bold;">التحاليل</td></tr>
                @foreach($labs as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">تحليل</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- أشعة --}}
            @if($radiologies->count())
                <tr><td colspan="4" style="background: #fff3e0; padding: 8px; font-weight: bold;">الأشعة</td></tr>
                @foreach($radiologies as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">أشعة</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- مستلزمات --}}
            @if($supplies->count())
                <tr><td colspan="4" style="background: #fce4ec; padding: 8px; font-weight: bold;">المستلزمات</td></tr>
                @foreach($supplies as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">مستلزم</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif

            {{-- أدوية --}}
            @if($medicines->count())
                <tr><td colspan="4" style="background: #f3e5f5; padding: 8px; font-weight: bold;">الأدوية</td></tr>
                @foreach($medicines as $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $counter++ }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">دواء</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ number_format($item->total, 2) }} جنيه</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- (4) الإجماليات --}}
    <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
        <table style="width: 300px; border-collapse: collapse;">
            <tr style="border-top: 2px solid #333;">
                <td style="padding: 5px;"><strong>الإجمالي:</strong></td>
                <td style="text-align: right; padding: 5px;">{{ number_format($this->payment->total_amount, 2) }} جنيه</td>
            </tr>
            @if($this->payment->contract && $this->payment->contract->copay_percentage > 0)
            <tr>
                <td style="padding: 5px;"><strong>تحمل المريض ({{ $this->payment->contract->copay_percentage }}%):</strong></td>
                <td style="text-align: right; padding: 5px;">{{ number_format($this->payment->total_amount * $this->payment->contract->copay_percentage / 100, 2) }} جنيه</td>
            </tr>
            @endif
            <tr style="border-top: 1px solid #ccc;">
                <td style="padding: 5px;"><strong>المدفوع:</strong></td>
                <td style="text-align: right; padding: 5px;">{{ number_format($this->payment->paid_amount, 2) }} جنيه</td>
            </tr>
            <tr>
                <td style="padding: 5px;"><strong>المتبقي:</strong></td>
                <td style="text-align: right; padding: 5px; color: {{ $this->payment->remaining_amount > 0 ? 'red' : 'green' }};">
                    {{ number_format($this->payment->remaining_amount, 2) }} جنيه
                </td>
            </tr>
            <tr style="border-top: 2px solid #333;">
                <td style="padding: 5px;"><strong>طريقة الدفع:</strong></td>
                <td style="text-align: right; padding: 5px;">
                    @switch($this->payment->payment_method)
                        @case('cash') نقدي @break
                        @case('card') بطاقة @break
                        @case('insurance') تأمين @break
                        @case('corporate') تعاقد @break
                        @default {{ $this->payment->payment_method }}
                    @endswitch
                </td>
            </tr>
        </table>
    </div>

    {{-- (5) تذييل --}}
    <hr>
    <div style="text-align: center; font-size: 12px; color: #666;">
        <p>شكراً لزيارتكم — لمزيد من الاستفسارات: 01012345678</p>
        <p>{{ $this->payment->created_at->format('Y-m-d H:i') }} | المستلم: {{ auth()->user()->name }}</p>
    </div>

</div>
```

#### `resources/views/reports/patient-report.blade.php` — 114 lines, 4.7 KB

```php
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تقرير المرضى</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f5f5f5; }
        .stats { display: flex; gap: 15px; margin-bottom: 20px; }
        .stat-box { flex: 1; padding: 15px; border-radius: 8px; text-align: center; min-width: 100px; }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; }
        .btn-print { background: #2563eb; color: #fff; }
        .btn-excel { background: #16a34a; color: #fff; }
        .btn-csv { background: #ca8a04; color: #fff; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    {{-- (1) أزرار التصدير والطباعة --}}
    <div class="no-print" style="margin-bottom: 15px;">
        <button class="btn btn-print" onclick="window.print()">🖨️ طباعة</button>
        <button class="btn btn-excel" onclick="exportTable('excel')">📥 تصدير Excel</button>
        <button class="btn btn-csv" onclick="exportTable('csv')">📥 تصدير CSV</button>
    </div>

    {{-- (2) بطاقات الإحصائيات --}}
    <div class="stats">
        <div class="stat-box" style="background: #e8f5e9;">
            <div style="font-size: 28px; font-weight: bold; color: #2e7d32;">{{ $total }}</div>
            <div style="color: #666;">إجمالي المرضى</div>
        </div>
        <div class="stat-box" style="background: #e3f2fd;">
            <div style="font-size: 28px; font-weight: bold; color: #1565c0;">{{ $male }}</div>
            <div style="color: #666;">ذكور</div>
        </div>
        <div class="stat-box" style="background: #fce4ec;">
            <div style="font-size: 28px; font-weight: bold; color: #c62828;">{{ $female }}</div>
            <div style="color: #666;">إناث</div>
        </div>
    </div>

    {{-- (3) معلومات الفترة --}}
    <p style="color: #666; margin-bottom: 15px;">
        الفترة: <strong>{{ $dateFrom }} ← {{ $dateTo }}</strong>
    </p>

    {{-- (4) جدول التقرير --}}
    <table id="reportTable">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم كاملاً</th>
                <th>رقم الهاتف</th>
                <th>الجنس</th>
                <th>العمر</th>
                <th>العقد</th>
                <th>تاريخ التسجيل</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->gender === 'male' ? 'ذكر' : 'أنثى' }}</td>
                <td>{{ $patient->date_of_birth?->age ?? '—' }}</td>
                <td>{{ $patient->contract?->name ?? '—' }}</td>
                <td>{{ $patient->created_at->format('Y-m-d') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">لا توجد نتائج في هذه الفترة</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p style="margin-top: 10px; color: #666;">إجمالي النتائج: <strong>{{ $total }}</strong> مريض</p>

    {{-- (5) سكريبت التصدير --}}
    <script>
        function exportTable(type) {
            let table = document.getElementById('reportTable');
            let rows = table.querySelectorAll('tr');
            let data = [];
            
            rows.forEach(row => {
                let cols = row.querySelectorAll('th, td');
                let rowData = [];
                cols.forEach(col => rowData.push('"' + col.innerText.replace(/"/g, '""') + '"'));
                data.push(rowData.join(','));
            });

            let content = data.join('\n');
            let mime = type === 'excel' ? 'application/vnd.ms-excel' : 'text/csv';
            let ext = type === 'excel' ? '.xls' : '.csv';
            let bom = '\uFEFF';

            let blob = new Blob([bom + content], { type: mime + ';charset=utf-8;' });
            let link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'تقرير_المرضى' + ext;
            link.click();
        }
    </script>

</body>
</html>
```

#### `resources/views/welcome.blade.php` — 177 lines, 40.5 KB

```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */*,:before,:after{--tw-border-spacing-x: 0;--tw-border-spacing-y: 0;--tw-translate-x: 0;--tw-translate-y: 0;--tw-rotate: 0;--tw-skew-x: 0;--tw-skew-y: 0;--tw-scale-x: 1;--tw-scale-y: 1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness: proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: rgb(59 130 246 / .5);--tw-ring-offset-shadow: 0 0 #0000;--tw-ring-shadow: 0 0 #0000;--tw-shadow: 0 0 #0000;--tw-shadow-colored: 0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x: 0;--tw-border-spacing-y: 0;--tw-translate-x: 0;--tw-translate-y: 0;--tw-rotate: 0;--tw-skew-x: 0;--tw-skew-y: 0;--tw-scale-x: 1;--tw-scale-y: 1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness: proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: rgb(59 130 246 / .5);--tw-ring-offset-shadow: 0 0 #0000;--tw-ring-shadow: 0 0 #0000;--tw-shadow: 0 0 #0000;--tw-shadow-colored: 0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}:before,:after{--tw-content: ""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;-o-tab-size:4;tab-size:4;font-family:Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}ol,ul,menu{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::-moz-placeholder,textarea::-moz-placeholder{opacity:1;color:#9ca3af}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}button,[role=button]{cursor:pointer}:disabled{cursor:default}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.absolute{position:absolute}.relative{position:relative}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-left-20{left:-5rem}.top-0{top:0}.z-0{z-index:0}.\!row-span-1{grid-row:span 1 / span 1!important}.-mx-3{margin-left:-.75rem;margin-right:-.75rem}.-ml-px{margin-left:-1px}.ml-3{margin-left:.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.inline-flex{display:inline-flex}.table{display:table}.grid{display:grid}.\!hidden{display:none!important}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-5{height:1.25rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-5{width:1.25rem}.w-\[calc\(100\%_\+_8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.w-full{width:100%}.max-w-2xl{max-width:42rem}.max-w-\[877px\]{max-width:877px}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.cursor-default{cursor:default}.resize{resize:both}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.\!flex-row{flex-direction:row!important}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.justify-items-center{justify-items:center}.gap-2{gap:.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:.5rem}.rounded-md{border-radius:.375rem}.rounded-sm{border-radius:.125rem}.rounded-l-md{border-top-left-radius:.375rem;border-bottom-left-radius:.375rem}.rounded-r-md{border-top-right-radius:.375rem;border-bottom-right-radius:.375rem}.border{border-width:1px}.border-gray-300{--tw-border-opacity: 1;border-color:rgb(209 213 219 / var(--tw-border-opacity, 1))}.bg-\[\#FF2D20\]\/10{background-color:#ff2d201a}.bg-gray-50{--tw-bg-opacity: 1;background-color:rgb(249 250 251 / var(--tw-bg-opacity, 1))}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.bg-gradient-to-b{background-image:linear-gradient(to bottom,var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from: transparent var(--tw-gradient-from-position);--tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to: #fff var(--tw-gradient-to-position)}.to-zinc-900{--tw-gradient-to: #18181b var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#ff2d20}.object-cover{-o-object-fit:cover;object-fit:cover}.object-top{-o-object-position:top;object-position:top}.p-6{padding:1.5rem}.px-2{padding-left:.5rem;padding-right:.5rem}.px-3{padding-left:.75rem;padding-right:.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.pt-3{padding-top:.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji"}.text-sm{font-size:.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-medium{font-weight:500}.font-semibold{font-weight:600}.leading-5{line-height:1.25rem}.text-black{--tw-text-opacity: 1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.text-black\/50{color:#00000080}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.underline{text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\,0\,0\,0\.08\)\]{--tw-shadow: 0px 14px 34px 0px rgba(0,0,0,.08);--tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-sm{--tw-shadow: 0 1px 2px 0 rgb(0 0 0 / .05);--tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.ring-black{--tw-ring-opacity: 1;--tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity, 1))}.ring-gray-300{--tw-ring-opacity: 1;--tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity, 1))}.ring-transparent{--tw-ring-color: transparent}.ring-white{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity, 1))}.ring-white\/\[0\.05\]{--tw-ring-color: rgb(255 255 255 / .05)}.drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.06\)\]{--tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.25\)\]{--tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.filter{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,-webkit-backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.duration-150{transition-duration:.15s}.duration-300{transition-duration:.3s}.ease-in-out{transition-timing-function:cubic-bezier(.4,0,.2,1)}.selection\:bg-\[\#FF2D20\] *::-moz-selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:text-white *::-moz-selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:text-white *::selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:bg-\[\#FF2D20\]::-moz-selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:text-white::-moz-selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:text-white::selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.hover\:text-black:hover{--tw-text-opacity: 1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.hover\:text-black\/70:hover{color:#000000b3}.hover\:text-gray-400:hover{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.hover\:text-gray-500:hover{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.hover\:ring-black\/20:hover{--tw-ring-color: rgb(0 0 0 / .2)}.focus\:z-10:focus{z-index:10}.focus\:border-blue-300:focus{--tw-border-opacity: 1;border-color:rgb(147 197 253 / var(--tw-border-opacity, 1))}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus\:ring:focus{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity, 1))}.active\:bg-gray-100:active{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity, 1))}.active\:text-gray-500:active{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.active\:text-gray-700:active{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}@media (min-width: 640px){.sm\:flex{display:flex}.sm\:hidden{display:none}.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:flex-1{flex:1 1 0%}.sm\:items-center{align-items:center}.sm\:justify-between{justify-content:space-between}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.lg\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0}.lg\:text-\[\#FF2D20\]{--tw-text-opacity: 1;color:rgb(255 45 32 / var(--tw-text-opacity, 1))}}.rtl\:flex-row-reverse:where([dir=rtl],[dir=rtl] *){flex-direction:row-reverse}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-gray-600{--tw-border-opacity: 1;border-color:rgb(75 85 99 / var(--tw-border-opacity, 1))}.dark\:bg-black{--tw-bg-opacity: 1;background-color:rgb(0 0 0 / var(--tw-bg-opacity, 1))}.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity, 1))}.dark\:bg-zinc-900{--tw-bg-opacity: 1;background-color:rgb(24 24 27 / var(--tw-bg-opacity, 1))}.dark\:via-zinc-900{--tw-gradient-to: rgb(24 24 27 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to: #18181b var(--tw-gradient-to-position)}.dark\:text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.dark\:text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity, 1))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.dark\:text-white\/50{color:#ffffff80}.dark\:text-white\/70{color:#ffffffb3}.dark\:ring-zinc-800{--tw-ring-opacity: 1;--tw-ring-color: rgb(39 39 42 / var(--tw-ring-opacity, 1))}.dark\:hover\:text-gray-300:hover{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.dark\:hover\:text-white:hover{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.dark\:hover\:text-white\/70:hover{color:#ffffffb3}.dark\:hover\:text-white\/80:hover{color:#fffc}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity: 1;--tw-ring-color: rgb(63 63 70 / var(--tw-ring-opacity, 1))}.dark\:focus\:border-blue-700:focus{--tw-border-opacity: 1;border-color:rgb(29 78 216 / var(--tw-border-opacity, 1))}.dark\:focus\:border-blue-800:focus{--tw-border-opacity: 1;border-color:rgb(30 64 175 / var(--tw-border-opacity, 1))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity, 1))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity, 1))}.dark\:active\:bg-gray-700:active{--tw-bg-opacity: 1;background-color:rgb(55 65 81 / var(--tw-bg-opacity, 1))}.dark\:active\:text-gray-300:active{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}}
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <a
                                href="https://laravel.com/docs"
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                        onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        "
                                    />
                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                                        alt="Laravel documentation screenshot"
                                        class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                    />
                                    <div
                                        class="absolute -bottom-16 -left-16 h-40 w-[calc(100%_+_8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                    ></div>
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                            <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#FF2D20" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"/><path fill="#FF2D20" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"/></svg>
                                        </div>

                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                                Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                            </p>
                                        </div>
                                    </div>

                                    <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                                </div>
                            </a>

                            <a
                                href="https://laracasts.com"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laracasts</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <a
                                href="https://laravel-news.com"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"/><path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"/><path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"/></g></svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laravel News</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FF2D20">
                                            <path
                                                d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z"
                                            />
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white dark:focus-visible:ring-[#FF2D20]">Forge</a>, <a href="https://vapor.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Vapor</a>, <a href="https://nova.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Nova</a>, <a href="https://envoyer.io" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Envoyer</a>, and <a href="https://herd.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Herd</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Echo</a>, <a href="https://laravel.com/docs/horizon" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Telescope</a>, and more.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
```

### 📂 `resources/js` (2 files)

#### `resources/js/app.js` — 2 lines, 22.0 B

```javascript
import './bootstrap';
```

#### `resources/js/bootstrap.js` — 5 lines, 127.0 B

```javascript
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
```

### 📂 `resources/css` (1 files)

#### `resources/css/app.css` — 4 lines, 59.0 B

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

### 📂 `config` (10 files)

#### `config/app.php` — 127 lines, 4.2 KB

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
```

#### `config/auth.php` — 116 lines, 3.9 KB

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
```

#### `config/cache.php` — 109 lines, 3.4 KB

```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];
```

#### `config/database.php` — 174 lines, 6.1 KB

```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
```

#### `config/filesystems.php` — 81 lines, 2.4 KB

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
```

#### `config/logging.php` — 133 lines, 4.2 KB

```php
<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        'stack' => [
            'driver' => 'stack',
            'channels' => explode(',', env('LOG_STACK', 'single')),
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAILY_DAYS', 14),
            'replace_placeholders' => true,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => env('LOG_SLACK_USERNAME', 'Laravel Log'),
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
            'processors' => [PsrLogMessageProcessor::class],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'replace_placeholders' => true,
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

    ],

];
```

#### `config/mail.php` — 117 lines, 3.5 KB

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];
```

#### `config/queue.php` — 113 lines, 3.7 KB

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
```

#### `config/services.php` — 39 lines, 1.0 KB

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
```

#### `config/session.php` — 218 lines, 7.7 KB

```php
<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. Database storage is a great default choice.
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to expire immediately when the browser is closed then you may
    | indicate that via the expire_on_close configuration option.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it's stored. All encryption is performed
    | automatically by Laravel and you may use the session like normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When utilizing the "file" session driver, the session files are placed
    | on disk. The default storage location is defined here; however, you
    | are free to provide another location where they should be stored.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. Of course, a sensible default is defined
    | for you; however, you're welcome to change this to another table.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using one of the framework's cache driven session backends, you may
    | define the cache store which should be used to store the session data
    | between requests. This must match one of your defined cache stores.
    |
    | Affects: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the session cookie that is created by
    | the framework. Typically, you should not need to change this value
    | since doing so does not grant a meaningful security improvement.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain and all subdomains. Typically, this shouldn't be changed.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
    | will set this value to "lax" to permit secure cross-site requests.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Supported: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will tie the cookie to the top-level site for
    | a cross-site context. Partitioned cookies are accepted by the browser
    | when flagged "secure" and the Same-Site attribute is set to "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
```

### 📂 `tests` (3 files)

#### `tests/Feature/ExampleTest.php` — 20 lines, 359.0 B

```php
<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
```

#### `tests/TestCase.php` — 11 lines, 142.0 B

```php
<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //
}
```

#### `tests/Unit/ExampleTest.php` — 17 lines, 243.0 B

```php
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
}
```

### 📂 `(root)` (12 files)

#### `composer.json` — 79 lines, 2.4 KB

```json
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": ["laravel", "framework"],
    "license": "MIT",
    "require": {
        "php": "^8.2",
        "filament/filament": "3.3",
        "laravel/framework": "^11.31",
        "laravel/tinker": "^2.9"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/pail": "^1.1",
        "laravel/pint": "^1.13",
        "laravel/sail": "^1.26",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.1",
        "phpunit/phpunit": "^11.0.1"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi",
            "@php artisan filament:upgrade"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "dev": [
            "Composer\\Config::disableProcessTimeout",
            "npx concurrently -c \"#93c5fd,#c4b5fd,#fb7185,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"php artisan pail --timeout=0\" \"npm run dev\" --names=server,queue,logs,vite"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        },
        "policy": {
            "advisories": {
                "block": false
            }
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
```

#### `package.json` — 18 lines, 383.0 B

```json
{
    "private": true,
    "type": "module",
    "scripts": {
        "build": "vite build",
        "dev": "vite"
    },
    "devDependencies": {
        "autoprefixer": "^10.4.20",
        "axios": "^1.7.4",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^1.2.0",
        "postcss": "^8.4.47",
        "tailwindcss": "^3.4.13",
        "vite": "^6.0.11"
    }
}
```

#### `artisan` — 16 lines, 350.0 B

```text
#!/usr/bin/env php
<?php

use Symfony\Component\Console\Input\ArgvInput;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the command...
$status = (require_once __DIR__.'/bootstrap/app.php')
    ->handleCommand(new ArgvInput);

exit($status);
```

#### `.env` — 67 lines, 1.1 KB

```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/g66Npdvnm3m+AodrjONnr+5uprTcsjQ5DBSpQR3+6o=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clinic_management
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

#### `.env.example` — 67 lines, 1.1 KB

```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

#### `phpunit.xml` — 34 lines, 1.2 KB

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/phpunit/phpunit/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true"
>
    <testsuites>
        <testsuite name="Unit">
            <directory>tests/Unit</directory>
        </testsuite>
        <testsuite name="Feature">
            <directory>tests/Feature</directory>
        </testsuite>
    </testsuites>
    <source>
        <include>
            <directory>app</directory>
        </include>
    </source>
    <php>
        <env name="APP_ENV" value="testing"/>
        <env name="APP_MAINTENANCE_DRIVER" value="file"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="CACHE_STORE" value="array"/>
        <!-- <env name="DB_CONNECTION" value="sqlite"/> -->
        <!-- <env name="DB_DATABASE" value=":memory:"/> -->
        <env name="MAIL_MAILER" value="array"/>
        <env name="PULSE_ENABLED" value="false"/>
        <env name="QUEUE_CONNECTION" value="sync"/>
        <env name="SESSION_DRIVER" value="array"/>
        <env name="TELESCOPE_ENABLED" value="false"/>
    </php>
</phpunit>
```

#### `vite.config.js` — 12 lines, 263.0 B

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

#### `tailwind.config.js` — 21 lines, 551.0 B

```javascript
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
```

#### `postcss.config.js` — 7 lines, 93.0 B

```javascript
export default {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};
```

#### `README.md` — 67 lines, 4.0 KB

```markdown
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
```

#### `bootstrap/app.php` — 40 lines, 1.5 KB

```php
<?php

// (1) استيراد الكلاسات الأساسية من نواة Laravel
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

// (2) استيراد Middleware المخصصة التي أنشأناها
use App\Http\Middleware\SetUserLocale;
use App\Http\Middleware\CheckRole;

// (3) إنشاء تطبيق Laravel جديد مع تحديد المسار الأساسي للمشروع
return Application::configure(basePath: dirname(__DIR__))

    // (4) withRouting(): تسجيل مسارات التطبيق
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
    )

    // (5) withMiddleware(): تسجيل وتكوين طبقات الـ Middleware
    ->withMiddleware(function (Middleware $middleware) {

        // (6) alias(): تسجيل Middleware المخصصة بأسماء مستعارة
        $middleware->alias([
            // (7) 'set.locale': لتطبيق لغة المستخدم تلقائياً
            'set.locale' => SetUserLocale::class,

            // (8) 'role': لفحص دور المستخدم قبل السماح بالدخول
            'role' => CheckRole::class,
        ]);
    })

    // (9) withExceptions(): تكوين كيفية التعامل مع الاستثناءات
    ->withExceptions(function (Exceptions $exceptions) {
        // (10) حالياً فارغ
    })

    // (11) create(): بناء وإرجاع كائن التطبيق الجاهز للتشغيل
    ->create();
```

#### `bootstrap/providers.php` — 7 lines, 118.0 B

```php
<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
];
```

