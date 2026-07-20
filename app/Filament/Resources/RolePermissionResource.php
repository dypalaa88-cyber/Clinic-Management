<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
use App\Filament\Resources\RolePermissionResource\Pages;
use App\Models\RolePermission;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس RolePermissionResource
class RolePermissionResource extends Resource
{
    // (4) ربط الـ Resource بموديل RolePermission
    protected static ?string $model = RolePermission::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'الصلاحيات';
    protected static ?string $modelLabel = 'صلاحية';
    protected static ?string $pluralModelLabel = 'الصلاحيات';

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'الإعدادات';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل صلاحية
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // (9) role: اختيار الدور
                Select::make('role')
                    ->label('الدور')
                    ->options([
                        'admin'         => 'مدير النظام',
                        'doctor'        => 'طبيب',
                        'receptionist'  => 'موظف استقبال',
                    ])
                    ->required(),

                // (10) resource: اسم الشاشة
                Select::make('resource')
                    ->label('الشاشة')
                    ->options([
                        'Dashboard'              => 'لوحة التحكم',
                        'PatientResource'        => 'المرضى',
                        'AppointmentResource'    => 'المواعيد',
                        'DoctorResource'         => 'الأطباء',
                        'SpecialtyResource'      => 'التخصصات',
                        'RoomResource'           => 'الغرف والعيادات',
                        'ScheduleResource'       => 'جداول الأطباء',
                        'PriceListResource'      => 'لوائح الأسعار',
                        'ContractResource'       => 'العقود',
                        'PaymentResource'        => 'فواتير',
                        'InventoryItemResource'  => 'المخازن والصيدلية',
                        'RolePermissionResource' => 'الصلاحيات',
                        'UserResource'           => 'المستخدمين',
                    ])
                    ->required(),

                // (11) can_view: السماح بالمشاهدة
                Toggle::make('can_view')
                    ->label('السماح بالمشاهدة')
                    ->default(true),

                // (12) can_create: السماح بإنشاء سجلات
                Toggle::make('can_create')
                    ->label('السماح بالإضافة')
                    ->default(true),

                // (13) can_edit: السماح بالتعديل
                Toggle::make('can_edit')
                    ->label('السماح بالتعديل')
                    ->default(true),

                // (14) can_delete: السماح بالحذف
                Toggle::make('can_delete')
                    ->label('السماح بالحذف')
                    ->default(true),
            ]);
    }

    /**
     * (15) دالة table(): جدول عرض الصلاحيات
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                    ->sortable(),

                TextColumn::make('resource')
                    ->label('الشاشة')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'Dashboard'              => 'لوحة التحكم',
                            'PatientResource'        => 'المرضى',
                            'AppointmentResource'    => 'المواعيد',
                            'DoctorResource'         => 'الأطباء',
                            'SpecialtyResource'      => 'التخصصات',
                            'RoomResource'           => 'الغرف والعيادات',
                            'ScheduleResource'       => 'جداول الأطباء',
                            'PriceListResource'      => 'لوائح الأسعار',
                            'ContractResource'       => 'العقود',
                            'PaymentResource'        => 'فواتير',
                            'InventoryItemResource'  => 'المخازن والصيدلية',
                            'RolePermissionResource' => 'الصلاحيات',
                            'UserResource'           => 'المستخدمين',
                            default                  => $state,
                        };
                    })
                    ->sortable(),

                IconColumn::make('can_view')
                    ->label('عرض')
                    ->boolean(),

                IconColumn::make('can_create')
                    ->label('إضافة')
                    ->boolean(),

                IconColumn::make('can_edit')
                    ->label('تعديل')
                    ->boolean(),

                IconColumn::make('can_delete')
                    ->label('حذف')
                    ->boolean(),
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
     * (16) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (17) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListRolePermissions::route('/'),
            'create' => Pages\CreateRolePermission::route('/create'),
            'edit'   => Pages\EditRolePermission::route('/{record}/edit'),
        ];
    }
}