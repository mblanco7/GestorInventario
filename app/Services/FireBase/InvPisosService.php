<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvPiso;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvPisoList;
use Google\Cloud\Firestore\FirestoreClient;

class InvPisosService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvPiso::path());
    }

    public function getById(string $id): ?InvPiso {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvPiso($preresults) : null;
    }

    /**
     * @return InvPisoList
     */
    public function getAll(): InvPisoList { 
        $results = new InvPisoList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvPiso(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvPiso $objeto) : InvPiso {
        return parent::saveEntity($objeto);
    }

    public function delete(InvPiso $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}