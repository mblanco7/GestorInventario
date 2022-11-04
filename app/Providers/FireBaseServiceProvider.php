<?php

namespace App\Providers;

use App\Services\FireBase\ArqPerfilesService;
use App\Services\FireBase\ArqRolesPerfilesService;
use App\Services\FireBase\ArqRolesService;
use App\Services\FireBase\ArqUsuariosService;
use App\Services\FireBase\InvBodegasService;
use App\Services\FireBase\InvCategoriasService;
use App\Services\FireBase\InvColoresService;
use App\Services\FireBase\InvEstantesService;
use App\Services\FireBase\InvMarcasService;
use App\Services\FireBase\InvPasillosService;
use App\Services\FireBase\InvPisosService;
use App\Services\FireBase\InvProductosService;
use App\Services\FireBase\InvPuestosService;
use App\Services\FireBase\InvTallasService;
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
        ArqRolesService::class,
        ArqRolesPerfilesService::class,
        InvBodegasService::class,
        InvCategoriasService::class,
        InvColoresService::class,
        InvEstantesService::class,
        InvMarcasService::class,
        InvPasillosService::class,
        InvPisosService::class,
        InvProductosService::class,
        InvPuestosService::class,
        InvTallasService::class,
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
