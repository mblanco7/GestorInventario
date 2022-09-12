<?php

namespace App\Models\Firebase;

use Kreait\Firebase\Database;
use Kreait\Firebase\Database\Reference;
use Kreait\Firebase\Factory;

class EntityService {

    private $path;
    private Factory $factory;
    protected Database $database;
    protected Reference $reference;

    public function __construct(Factory $factory, $path)
    {
        $this->path = $path;
        $this->factory = $factory;
        $this->database = $factory->createDatabase();
        $this->reference = $this->database->getReference($path);
    }

    public function getById(string $id) {
        return $this->reference->orderByKey()->equalTo($id)->limitToFirst(1)->getSnapshot()->getValue();
    }

    public function getAll() {
        return $this->reference->getSnapshot()->getValue();
    }

    public function saveEntity(Model $objeto, string $path) {
        if ($objeto->id != null) {
            $id = $objeto->id;
            $objeto->id = null;
            $reference = $this->database->getReference($path.'/'.$id);
            $objeto->id = $id;
            $reference->set($objeto);
        } else {
            $reference = $this->database->getReference($path);
            $idReference = $reference->push($objeto);
            $objeto->id = $idReference->getKey();
        }
        return $objeto;
    }

}