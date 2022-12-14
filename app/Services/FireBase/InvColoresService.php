<?php

namespace App\Services\FireBase;

use App\Models\FireBase\Entities\InvColor;
use App\Models\FireBase\EntityService;
use App\Models\FireBase\Iterators\InvColorList;
use Google\Cloud\Firestore\FirestoreClient;

class InvColoresService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvColor::path());
    }

    public function getById(string $id): ?InvColor {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvColor($preresults) : null;
    }

    /**
     * @return InvColorList
     */
    public function getAll(): InvColorList { 
        $results = new InvColorList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvColor(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvColor $objeto) : InvColor {
        return parent::saveEntity($objeto);
    }

    public function delete(InvColor $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

}