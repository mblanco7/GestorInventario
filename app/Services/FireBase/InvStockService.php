<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvKardex;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvKardexList;
use Google\Cloud\Firestore\FirestoreClient;

class InvKardexService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvKardex::path());
    }

    public function getById(string $id): InvKardex {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvKardex($preresults) : null;
    }

    /**
     * @return InvKardexList
     */
    public function getAll(): InvKardexList { 
        $results = new InvKardexList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
           $objeto = new InvKardex(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvKardex $objeto) : InvKardex {
        return parent::saveEntity($objeto);
    }

    public function delete(InvKardex $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}