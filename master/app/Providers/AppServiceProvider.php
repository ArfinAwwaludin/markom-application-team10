<?php

namespace App\Providers;

//use App\Observers\PostObserver;
//use App\Models\Role;
//use App\Models\Company;
//use App\Models\Employee;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


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
        Paginator::useBootstrap();
        //Role::observe(PostObserver::class);
        //Company::observe(PostObserver::class);
        //Employee::observe(PostObserver::class);
    }
}
