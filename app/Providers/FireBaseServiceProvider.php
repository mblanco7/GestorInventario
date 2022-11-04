<?php

namespace App\Providers;

use App\Services\Firebase\ArqPerfilesService;
use App\Services\Firebase\ArqRolesPerfilesService;
use App\Services\Firebase\ArqRolesService;
use App\Services\Firebase\ArqUsuariosService;
use App\Services\Firebase\InvBodegasService;
use App\Services\Firebase\InvCategoriasService;
use App\Services\Firebase\InvColoresService;
use App\Services\Firebase\InvEstantesService;
use App\Services\Firebase\InvMarcasService;
use App\Services\Firebase\InvPasillosService;
use App\Services\Firebase\InvPisosService;
use App\Services\Firebase\InvProductosService;
use App\Services\Firebase\InvPuestosService;
use App\Services\Firebase\InvTallasService;
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
