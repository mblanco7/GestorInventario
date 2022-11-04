<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvEstante;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvEstanteList;
use Google\Cloud\Firestore\FirestoreClient;

class InvEstantesService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvEstante::path());
    }

    public function getById(string $id): InvEstante {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvEstante($preresults) : null;
    }

    /**
     * @return InvEstanteList
     */
    public function getAll(): InvEstanteList { 
        $results = new InvEstanteList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvEstante(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvEstante $objeto) : InvEstante {
        return parent::saveEntity($objeto);
    }

    public function delete(InvEstante $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}