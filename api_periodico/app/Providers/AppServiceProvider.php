<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Users\UseCases\RegisterUser;
use App\Core\Users\UseCases\LoginUser;
use App\Core\Users\Repositories\UserRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\Core\Writers\Repositories\WriterRepository;
use App\Core\Writers\Repositories\WriterRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(RegisterUser::class, function ($app) {
            return new RegisterUser($app->make(UserRepository::class));
        });
        $this->app->bind(LoginUser::class, function ($app) {
            return new LoginUser($app->make(UserRepository::class));
        });
        $this->app->bind(WriterRepositoryInterface::class, WriterRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
