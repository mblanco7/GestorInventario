<?php

namespace App\Services\Firebase;

use App\Models\Firebase\Entities\InvProducto;
use App\Models\Firebase\EntityService;
use App\Models\Firebase\Iterators\InvProductoList;
use Google\Cloud\Firestore\FirestoreClient;

class InvProductosService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvProducto::path());
    }

    public function getById(string $id): ?InvProducto {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvProducto($preresults) : null;
    }

    /**
     * @return InvProductoList
     */
    public function getAll(): InvProductoList { 
        $results = new InvProductoList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvProducto(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvProducto $objeto) : InvProducto {
        return parent::saveEntity($objeto);
    }

    public function delete(InvProducto $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}