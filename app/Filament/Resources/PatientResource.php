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