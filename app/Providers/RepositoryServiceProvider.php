<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Document;
use App\Repositories\CategoryRepository;
use App\Repositories\DocumentRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Models\User;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });
        $this->app->bind(DocumentRepository::class, function ($app) {
            return new DocumentRepository(new Document());
        });
        $this->app->bind(CategoryRepository::class, function ($app) {
            return new CategoryRepository(new Category());
        });
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/repository.php' => config_path('repository.php'),
            ], 'config');
        }
    }
}
