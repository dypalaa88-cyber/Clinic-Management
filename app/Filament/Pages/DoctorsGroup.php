<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DoctorsGroup extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'الأطباء';
    protected static ?string $title = 'الأطباء والعيادات';
    protected static string $view = 'filament.pages.doctors-group';
    protected static ?string $slug = 'doctors-group';
}