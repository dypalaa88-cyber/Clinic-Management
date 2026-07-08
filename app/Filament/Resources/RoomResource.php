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