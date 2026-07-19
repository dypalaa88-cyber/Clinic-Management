<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources;

// (2) استيراد الكلاسات المطلوبة
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

// (3) تعريف كلاس PatientResource
class PatientResource extends Resource
{
    // (4) ربط الـ Resource بموديل Patient
    protected static ?string $model = Patient::class;

    // (5) أيقونة القائمة الجانبية
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // (6) تسميات القائمة
    protected static ?string $navigationLabel = 'المرضى';
    protected static ?string $modelLabel = 'مريض';
    protected static ?string $pluralModelLabel = 'المرضى';

    // (7) تجميع القائمة الجانبية — مجموعة "المرضى"
    protected static ?string $navigationGroup = 'المرضى';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل مريض
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

                Select::make('contract_id')
                    ->label('العقد')
                    ->options(function () {
                        $today = Carbon::today();
                        return Contract::where('is_active', true)
                            ->whereDate('start_date', '<=', $today)
                            ->whereDate('end_date', '>=', $today)
                            ->get()
                            ->mapWithKeys(function ($contract) {
                                return [$contract->id => $contract->name . ' (' . $contract->organization_name . ')'];
                            });
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

    /**
     * (9) دالة table(): جدول عرض المرضى
     */
    public static function table(Table $table): Table
    {
        return $table
            ->paginated([25])
            ->query(function () {
                return Patient::query()->with('contract');
            })
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
                    ->formatStateUsing(function ($state) {
                        return $state === 'male' ? 'ذكر' : 'أنثى';
                    }),

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

                        return $query->where(function ($query) use ($term) {
                            $query->where('first_name', 'like', "%{$term}%")
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

    /**
     * (10) دالة getRelations(): Relation Managers
     */
    public static function getRelations(): array
    {
        return [
            AppointmentsRelationManager::class,
            \App\Filament\Resources\PatientResource\RelationManagers\PaymentsRelationManager::class,
        ];
    }

    /**
     * (11) دالة getPages(): صفحات الـ Resource
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