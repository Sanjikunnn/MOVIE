<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\App;

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
// Tambahkan kode ini di sini
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            // Opsional: atur locale default jika tidak ada di sesi
            // App::setLocale(config('app.fallback_locale', 'en'));
        }
    }
}
