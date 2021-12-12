<?php

namespace App\Providers;

use App\Model\CvSubmit;
use App\Observers\CvSubmitObserver;
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
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        CvSubmit::observe(CvSubmitObserver::class);
    }
}
