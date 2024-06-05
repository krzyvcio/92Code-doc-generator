<?php

namespace App\Providers;

use App\Http\Controllers\Api\TokenController;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Middleware\VerifyEmail;

class SanctumServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerSanctum();
    }

    /**
     * Register the Sanctum routes.
     */
    protected function registerRoutes()
    {
        Route::prefix('api')->group(function () {
            Route::post('/token', [TokenController::class, 'store']);
            Route::delete('/token', [TokenController::class, 'destroy']);
        });
    }

    /**
     * Register the Sanctum configuration.
     */
    protected function registerSanctum()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        // Sanctum::useTokenPipeline(VerifyEmail::class);

    }
}