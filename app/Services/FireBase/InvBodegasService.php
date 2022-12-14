<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvBodega;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvBodegaList;
use Google\Cloud\Firestore\FirestoreClient;

class InvBodegasService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvBodega::path());
    }

    public function getById(string $id): ?InvBodega {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvBodega($preresults) : null;
    }

    /**
     * @return InvBodegaList
     */
    public function getAll(): InvBodegaList { 
        $results = new InvBodegaList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvBodega(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvBodega $objeto) : InvBodega {
        return parent::saveEntity($objeto);
    }

    public function delete(InvBodega $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}