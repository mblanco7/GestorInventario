<?php

namespace App\Models\Firebase;

use Exception;
use Google\Cloud\Firestore\CollectionReference;
use Google\Cloud\Firestore\FirestoreClient;
use ReflectionClass;

class EntityService {

    private int $deep = 1;
    
    protected FirestoreClient $database;
    protected CollectionReference $collection;


    public function __construct(FirestoreClient $database, $path)
    {
        $this->database = $database;
        $this->collection = $this->database->collection($path);
    }

    public function getById(string $id) {
        $result = ($this->collection->where('id', '=', $id)->documents()->rows()[0])->data();
        $this->initializeAtrributes($result, $this->deep);
        return $result;
    }

    public function getAll() : array {
        $results = [];
        $documents = $this->collection->documents();
        foreach ($documents as $document) {
            if ($document->exists()) {
                $data = $document->data();
                $this->initializeAtrributes($data, $this->deep);
                array_push($results, $data);
            }
        }
        return $results;
    }

    private function initializeAtrributes(&$data, int $deep) {
        foreach ($data as $attr => $value) {
            if ($deep > 0 && gettype($value) == 'object' && get_class($value) == 'Google\Cloud\Firestore\DocumentReference') {
                $snapValue = $value->snapshot()->data();
                $data[$attr] = $snapValue;
                $this->initializeAtrributes($data[$attr], --$deep);
            }
        }
    }

    public function saveEntity(Model $objeto) {
        if ($objeto->id != null) {
            $id = $objeto->id;
            $reference = $this->collection->document($id);
            $reference->update($this->generateArray($objeto));
        } else {
            $array = $this->generateArray($objeto);
            $reference = $this->collection->add();
            $array['id'] = $objeto->id = $reference->id();
            $this->collection->document($objeto->id)->set($array);
        }
        return $objeto;
    }

    public function generateArray($objeto) {
        $array = [];
        $rf = new ReflectionClass($objeto::class);
        foreach ($objeto as $attr => $value) {
            try {
                $property = $rf->getProperty($attr);
                if (str_contains($property->getType(), 'App\Models\Firebase\Entities')) {
                    $documentReference = $this->database->collection($value->path())->document($value->id);
                    $array[$attr] = $documentReference;
                } else {
                    $array[$attr] = $value;
                }
            } catch (Exception $e) {}
        }
        return $array;
    }
}