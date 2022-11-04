<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvTalla;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvTallaList;
use Google\Cloud\Firestore\FirestoreClient;

class InvTallasService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvTalla::path());
    }

    public function getById(string $id): InvTalla{
        $preresults = parent::getById($id);
        return $preresults != null ? new InvTalla($preresults) : null;
    }

    /**
     * @return InvTallaList
     */
    public function getAll(): InvTallaList { 
        $results = new InvTallaList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvTalla(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvTalla $objeto) : InvTalla {
        return parent::saveEntity($objeto);
    }

    public function delete(InvTalla $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}