<?php

namespace App\Providers;

use App\Models\Firebase\Services\ArqPerfilesService;
use App\Models\Firebase\Services\ArqRolesPerfilesService;
use App\Models\Firebase\Services\ArqRolesService;
use App\Models\Firebase\Services\ArqUsuariosService;
use App\Models\Firebase\Services\InvBodegasService;
use App\Models\Firebase\Services\InvCategoriasService;
use App\Models\Firebase\Services\InvColoresService;
use App\Models\Firebase\Services\InvEstantesService;
use App\Models\Firebase\Services\InvMarcasService;
use App\Models\Firebase\Services\InvPasillosService;
use App\Models\Firebase\Services\InvPisosService;
use App\Models\Firebase\Services\InvProductosService;
use App\Models\Firebase\Services\InvPuestosService;
use App\Models\Firebase\Services\InvTallasService;
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
