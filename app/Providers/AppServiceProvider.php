<?php

namespace App\Providers;

// use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Validator;

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
        Paginator::useBootstrap();
//         Validator::extend('date_greater_than', function($attribute, $value, $parameters, $validator) {
//             $inserted = Carbon::parse($value)->year;
//             $since = $parameters[0];
//             return $inserted >= $since && $inserted <= Carbon::now()->year;
// });
    }
}
