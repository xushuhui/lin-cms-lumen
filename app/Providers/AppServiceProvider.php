<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\BookService;
use App\Services\Impl\AuthServiceImpl;
use App\Services\Impl\BookServiceImpl;
use App\Services\Impl\LogServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\LogService;
use App\Services\UserService;
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
        $this->app->bind(UserService::class,UserServiceImpl::class);
        $this->app->bind(AuthService::class,AuthServiceImpl::class);
        $this->app->bind(BookService::class,BookServiceImpl::class);
        $this->app->bind(LogService::class,LogServiceImpl::class);
    }
}
