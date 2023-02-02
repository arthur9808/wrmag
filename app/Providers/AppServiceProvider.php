<?php

namespace App\Providers;
//Use ReCaptcha in Validators folder
use App\Validators\ReCaptcha;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // \Validator::extend('recaptcha', ReCaptcha::class . '@validate');
    }
}
