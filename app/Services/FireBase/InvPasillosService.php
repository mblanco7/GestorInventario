<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvPasillo;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvPasilloList;
use Google\Cloud\Firestore\FirestoreClient;

class InvPasillosService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvPasillo::path());
    }

    public function getById(string $id): ?InvPasillo {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvPasillo($preresults) : null;
    }

    /**
     * @return InvPasilloList
     */
    public function getAll(): InvPasilloList { 
        $results = new InvPasilloList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvPasillo(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvPasillo $objeto) : InvPasillo {
        return parent::saveEntity($objeto);
    }

    public function delete(InvPasillo $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

}