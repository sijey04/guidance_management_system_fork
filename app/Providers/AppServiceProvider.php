<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SchoolYear;
use App\Models\Semester;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $activeSchoolYear = SchoolYear::where('is_active', true)->first();
        $activeSemester = Semester::where('is_current', true)->first();
        $view->with('globalActiveSchoolYear', $activeSchoolYear);
        $view->with('globalActiveSemester', $activeSemester);


        
    });
    }
}
