<?php

namespace App\Models\Firebase\Services;

use App\Models\Firebase\Entities\InvPuesto;
use App\Models\Firebase\EntityService;
use App\Models\Firebase\Iterators\InvPuestoList;
use Google\Cloud\Firestore\FirestoreClient;

class InvPuestosService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvPuesto::path());
    }

    public function getById(string $id): ?InvPuesto{
        $preresults = parent::getById($id);
        return $preresults != null ? new InvPuesto($preresults) : null;
    }

    /**
     * @return InvPuestoList
     */
    public function getAll(): InvPuestoList { 
        $results = new InvPuestoList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvPuesto(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvPuesto $objeto) : InvPuesto {
        return parent::saveEntity($objeto);
    }

    public function delete(InvPuesto $objeto) : bool {
        return parent::deleteEntity($objeto);
    }
}