<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void#
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
    public function boot() {
        User::created(function ($model) {
            if ($model->id==1):
                $model->role = 'admin';
                $model->save();
            endif;
        });
    }

    
}