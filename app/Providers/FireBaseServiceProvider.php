<?php

namespace App\Providers;

use App\Models\Firebase\Services\ArqUsuariosService;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

class FireBaseServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        ArqUsuariosService::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Factory para Servicios
        $this->app->singleton(Factory::class, function($app) {
            return (new Factory)
            ->withServiceAccount(storage_path('firebase/connection/data_connection_firebase.json'))
            ->withDatabaseUri('https://gestorinventrio-default-rtdb.firebaseio.com/');;
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
    }
}
