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
            $reference = $this->database->getReference($path.'/'.$id);
            $reference->set($objeto);
        } else {
            $reference = $this->database->getReference($path);
            $objeto->id = $objeto::pref().$reference->push()->getKey();
            $reference->set([$objeto->id => $objeto]);
        }
        return $objeto;
    }

}