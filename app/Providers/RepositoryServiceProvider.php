<?php

namespace App\Providers;
use App\Interfaces\UserInterface;
use App\Interfaces\StaffInterface;

use App\Interfaces\EloquentInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\DailyReportInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\StaffRepository;
use App\Repository\Eloquent\DailyReportRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(EloquentInterface::class, BaseRepository::class);
        $this->app->bind(StaffInterface::class, StaffRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(DailyReportInterface::class, DailyReportRepository::class);
        $this->app->bind(StaffInterface::class, StaffRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
