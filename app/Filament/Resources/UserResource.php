<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Hash;

// (3) تعريف كلاس UserResource
class UserResource extends Resource
{
    // (4) ربط الـ Resource بموديل User
    protected static ?string $model = User::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-users';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'المستخدمين';
    protected static ?string $modelLabel = 'مستخدم';
    protected static ?string $pluralModelLabel = 'المستخدمين';

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'الإعدادات';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل مستخدم
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (9) name: اسم المستخدم
                TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),

                // (10) email: البريد الإلكتروني
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                // (11) password: كلمة المرور
                TextInput::make('password')
                    ->label('كلمة المرور')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser)
                    ->minLength(8)
                    ->dehydrateStateUsing(function ($state) {
                        // (12) تشفير كلمة المرور فقط إذا تم إدخالها
                        if (!empty($state)) {
                            return Hash::make($state);
                        }

                        return null;
                    })
                    ->dehydrated(function ($state) {
                        // (13) لا ترسل كلمة المرور إذا كانت فارغة (عند التعديل)
                        return !empty($state);
                    }),

                // (14) role: دور المستخدم
                Select::make('role')
                    ->label('الدور')
                    ->options([
                        'admin'         => 'مدير النظام',
                        'doctor'        => 'طبيب',
                        'receptionist'  => 'موظف استقبال',
                    ])
                    ->required()
                    ->default('receptionist'),

                // (15) locale: لغة المستخدم
                Select::make('locale')
                    ->label('اللغة')
                    ->options([
                        'ar' => '🇸🇦 العربية',
                        'en' => '🇬🇧 English',
                    ])
                    ->default('ar')
                    ->required(),
            ]);
    }

    /**
     * (16) دالة table(): جدول عرض المستخدمين
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->label('الدور')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'admin'         => 'مدير النظام',
                            'doctor'        => 'طبيب',
                            'receptionist'  => 'موظف استقبال',
                            default         => $state,
                        };
                    })
                    ->badge()
                    ->color(function ($state) {
                        return match ($state) {
                            'admin'         => 'success',
                            'doctor'        => 'info',
                            'receptionist'  => 'warning',
                            default         => 'gray',
                        };
                    })
                    ->sortable(),

                TextColumn::make('locale')
                    ->label('اللغة')
                    ->formatStateUsing(function ($state) {
                        return $state === 'ar' ? '🇸🇦 العربية' : '🇬🇧 English';
                    }),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('الدور')
                    ->options([
                        'admin'         => 'مدير النظام',
                        'doctor'        => 'طبيب',
                        'receptionist'  => 'موظف استقبال',
                    ]),
            ]);
    }

    /**
     * (17) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (18) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}