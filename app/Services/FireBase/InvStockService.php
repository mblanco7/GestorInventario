<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvStock;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvStockList;
use Exception;
use Google\Cloud\Firestore\FirestoreClient;

class InvStockService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvStock::path());
    }

    public function getById(string $id): InvStock {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvStock($preresults) : null;
    }

    /**
     * @return InvStockList
     */
    public function getAll(): InvStockList { 
        $results = new InvStockList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
           $objeto = new InvStock(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvStock $objeto) : InvStock {
        return parent::saveEntity($objeto);
    }

    public function delete(InvStock $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

    public function obtenerStockPorStock(InvStock $stock) : ?InvStock {
        $results = new InvStock();
        $preresults = [];
        $documents = $this->collection
        ->where('producto', '=', $stock->producto)
        ->where('talla', '=', $stock->talla)
        ->where('color', '=', $stock->color)
        ->where('ubicacion', '=', $stock->ubicacion)
        ->where('activo', '=', true)
        ->documents()->rows();
        $existe = (sizeof($documents) == 1 ? $documents[0]->data() : 
            sizeof($documents) == 0) ? null : throw new Exception("Mas de un registro de Stock con la configuración suministrada, revisar datos");
        $this->initializeAtrributesExternal($existe);
        $existe = $existe != null ? new InvStock($existe) : null;
        return $existe;
    }
}