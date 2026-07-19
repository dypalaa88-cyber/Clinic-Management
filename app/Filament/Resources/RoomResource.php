<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
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

    // (7) تجميع القائمة الجانبية
    protected static ?string $navigationGroup = 'الأطباء والعيادات';

    /**
     * (8) دالة form(): نموذج إضافة وتعديل غرفة
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم الغرفة')
                    ->required()
                    ->maxLength(50),

                TextInput::make('floor')
                    ->label('الطابق')
                    ->maxLength(20),

                TextInput::make('building')
                    ->label('المبنى')
                    ->maxLength(50),

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

                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('مفعّلة')
                    ->default(true),
            ]);
    }

    /**
     * (9) دالة table(): جدول عرض الغرف
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم الغرفة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('floor')
                    ->label('الطابق')
                    ->searchable(),

                TextColumn::make('building')
                    ->label('المبنى')
                    ->searchable(),

                TextColumn::make('type')
                    ->label('النوع')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'examination' => 'غرفة كشف',
                            'procedure'   => 'غرفة إجراءات',
                            'emergency'   => 'طوارئ',
                            'waiting'     => 'قاعة انتظار',
                            'office'      => 'مكتب إداري',
                            default       => $state,
                        };
                    }),

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

    /**
     * (10) دالة getRelations(): العلاقات
     */
    public static function getRelations(): array
    {
        return [];
    }

    /**
     * (11) دالة getPages(): صفحات الـ Resource
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