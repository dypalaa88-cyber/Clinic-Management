<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة من Filament
use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers\AppointmentsRelationManager;
use App\Models\Patient;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

// (3) تعريف كلاس PatientResource الذي يرث من Resource
class PatientResource extends Resource
{
    // (4) model: ربط الـ Resource بموديل Patient
    protected static ?string $model = Patient::class;

    // (5) navigationIcon: أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // (6) navigationLabel: اسم القائمة الجانبية
    protected static ?string $navigationLabel = 'المرضى';

    // (7) modelLabel: اسم المفرد للموديل
    protected static ?string $modelLabel = 'مريض';

    // (8) pluralModelLabel: اسم الجمع للموديل
    protected static ?string $pluralModelLabel = 'المرضى';

    /**
     * (9) دالة form(): بناء نموذج إضافة وتعديل مريض
     */
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

    /**
     * (10) دالة table(): بناء جدول عرض المرضى
     */
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

                TextColumn::make('date_of_birth')
                    ->label('تاريخ الميلاد')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('gender')
                    ->label('الجنس')
                    ->formatStateUsing(fn ($state) => $state === 'male' ? 'ذكر' : 'أنثى'),

                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y-m-d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->label('الجنس')
                    ->options([
                        'male'   => 'ذكر',
                        'female' => 'أنثى',
                    ]),
            ]);
    }

    /**
     * (11) دالة getRelations(): تسجيل Relation Managers
     *     هذا هو السطر الجديد الذي يفعّل سجل الزيارات
     */
    public static function getRelations(): array
    {
        return [
            AppointmentsRelationManager::class,
        ];
    }

    /**
     * (12) دالة getPages(): صفحات الـ Resource
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit'   => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}