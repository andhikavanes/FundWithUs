<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\UserResource;
use App\Models\blog;
use App\Models\event;
use App\Models\catalog;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count()),
            Stat::make('Blogs', blog::count()),
            Stat::make('Events', event::count()),
            Stat::make('Catalogs', catalog::count())
        ];
    }
}
