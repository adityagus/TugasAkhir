<?php

namespace App\Providers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;
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
    //   $this->app->bind('path.public', function() {
    //     return base_path().'/../public_html';
    // });
      
        Gate::define('mahasiswa', function(Mahasiswa $mahasiswa){
          return $mahasiswa->id;
          
        });
      config(['app.locale' => 'id']);
      Carbon::setLocale('id');
    }
}
