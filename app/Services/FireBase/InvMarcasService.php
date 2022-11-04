<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvMarca;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvMarcaList;
use Google\Cloud\Firestore\FirestoreClient;

class InvMarcasService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvMarca::path());
    }

    public function getById(string $id): ?InvMarca {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvMarca($preresults) : null;
    }

    /**
     * @return InvMarcaList
     */
    public function getAll(): InvMarcaList { 
        $results = new InvMarcaList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvMarca(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvMarca $objeto) : InvMarca {
        return parent::saveEntity($objeto);
    }

    public function delete(InvMarca $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}