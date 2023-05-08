<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        // $branchise = User::with('franchises')->where('role_id',2)->get();

        // dd($branchise);
        // view()->share('franchises', $branchise);
    }
}
