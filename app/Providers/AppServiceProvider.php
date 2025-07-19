<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
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
        // Force HTTPS in production
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        
        // Trust proxies for Railway deployment
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
        }
        
        // Set asset URL to use HTTPS
        if (env('ASSET_URL')) {
            URL::forceRootUrl(env('ASSET_URL'));
        }
        
        View::composer('*', function ($view) {
        $activeSchoolYear = SchoolYear::where('is_active', true)->first();
        $activeSemester = Semester::where('is_current', true)->first();
        $view->with('globalActiveSchoolYear', $activeSchoolYear);
        $view->with('globalActiveSemester', $activeSemester);


        
    });
    }
}
