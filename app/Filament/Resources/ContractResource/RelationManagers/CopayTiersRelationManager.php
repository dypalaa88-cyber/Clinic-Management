<?php

// (1) تحديد المسار التنظيمي للملف طبقاً لمعيار PSR-4
namespace App\Filament\Resources\ContractResource\RelationManagers;

// (2) استيراد الكلاسات المطلوبة
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Form;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

// (3) تعريف كلاس CopayTiersRelationManager
class CopayTiersRelationManager extends RelationManager
{
    // (4) اسم العلاقة في الموديل
    protected static string $relationship = 'copayTiers';

    // (5) تسميات القسم
    protected static ?string $title = 'نسب التحمل المتعددة';
    protected static ?string $modelLabel = 'شريحة تحمل';
    protected static ?string $pluralModelLabel = 'نسب التحمل';

    /**
     * (6) دالة form(): نموذج إضافة وتعديل شريحة تحمل
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // (7) category: اختيار متعدد للتصنيفات
                CheckboxList::make('category')
                    ->label('التصنيفات المشمولة')
                    ->options([
                        'all'        => 'كل التصنيفات (العقد بالكامل)',
                        'service'    => 'خدمة طبية',
                        'medicine'   => 'دواء',
                        'supply'     => 'مستلزم',
                        'lab'        => 'تحليل معملي',
                        'radiology'  => 'أشعة',
                    ])
                    ->required()
                    ->columns(2)
                    ->helperText('اختر "كل التصنيفات" ليشمل العقد بالكامل، أو اختر تصنيفات محددة'),

                // (8) tier_name: اسم الفئة
                TextInput::make('tier_name')
                    ->label('اسم الفئة (اختياري)')
                    ->maxLength(100)
                    ->nullable()
                    ->helperText('مثال: فئة المديرين، فئة الموظفين'),

                // (9) percentage: نسبة التحمل
                TextInput::make('percentage')
                    ->label('نسبة التحمل (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(0)
                    ->required()
                    ->suffix('%'),

                // (10) is_active: تفعيل/تعطيل
                Toggle::make('is_active')
                    ->label('مفعّلة')
                    ->default(true),
            ]);
    }

    /**
     * (11) دالة table(): جدول عرض شرائح التحمل
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')
                    ->label('التصنيفات')
                    ->formatStateUsing(function ($state) {
                        if (!$state || !is_array($state)) {
                            return '—';
                        }

                        $labels = [
                            'all'        => 'كل التصنيفات',
                            'service'    => 'خدمة طبية',
                            'medicine'   => 'دواء',
                            'supply'     => 'مستلزم',
                            'lab'        => 'تحليل معملي',
                            'radiology'  => 'أشعة',
                        ];

                        return collect($state)
                            ->map(function ($item) use ($labels) {
                                return $labels[$item] ?? $item;
                            })
                            ->join('، ');
                    })
                    ->badge(),

                TextColumn::make('tier_name')
                    ->label('اسم الفئة')
                    ->placeholder('—'),

                TextColumn::make('percentage')
                    ->label('نسبة التحمل')
                    ->formatStateUsing(function ($state) {
                        return $state . '%';
                    }),

                IconColumn::make('is_active')
                    ->label('مفعّلة')
                    ->boolean(),
            ])
            ->headerActions([
                CreateAction::make()->label('إضافة شريحة'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}