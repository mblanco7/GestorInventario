<?php

namespace App\Providers;

use App\Models\Firebase\Services\ArqPerfilesService;
use App\Models\Firebase\Services\ArqUsuariosService;
use Google\Cloud\Firestore\FirestoreClient;
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
        ArqUsuariosService::class,
        ArqPerfilesService::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $factory = (new Factory)
        ->withServiceAccount(storage_path('firebase/connection/data_connection_firebase.json'))
        ->withDatabaseUri('https://gestorinventrio-default-rtdb.firebaseio.com/');
        // Factory para Servicios
        $this->app->instance(Factory::class, $factory);
        $this->app->instance(FirestoreClient::class, $factory->createFirestore()->database());
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
