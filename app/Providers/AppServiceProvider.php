<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AllSlotsModel;
use View;


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
        $all_slotss = AllSlotsModel::all();       

        View::share('all_slotss', $all_slotss);   
        
    }
}
