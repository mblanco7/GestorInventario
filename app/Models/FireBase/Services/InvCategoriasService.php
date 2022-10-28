<?php

namespace App\Models\Firebase\Services;

use App\Models\Firebase\Entities\InvCategoria;
use App\Models\Firebase\EntityService;
use App\Models\Firebase\Iterators\InvCategoriaList;
use Google\Cloud\Firestore\FirestoreClient;

class InvCategoriasService extends EntityService{
 
    public function __construct(FirestoreClient $factory)
    {
       parent::__construct($factory, InvCategoria::path());
    }

    public function getById(string $id): ?InvCategoria {
        $preresults = parent::getById($id);
        return $preresults != null ? new InvCategoria($preresults) : null;
    }

    /**
     * @return InvCategoriaList
     */
    public function getAll(): InvCategoriaList { 
        $results = new InvCategoriaList();
        $preresults = parent::getAllArray();
        foreach ($preresults as $key => $value) {
            $objeto = new InvCategoria(array_merge(['id' => $key], $value));
           $results->add($objeto);
        }
        return $results;
    }

    public function save(InvCategoria $objeto) : InvCategoria {
        return parent::saveEntity($objeto);
    }

    public function delete(InvCategoria $objeto) : bool {
        return parent::deleteEntity($objeto);
    }

}