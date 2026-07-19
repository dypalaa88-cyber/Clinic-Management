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
    protected static ?string $navigationGroup = 'الإعدادات';
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