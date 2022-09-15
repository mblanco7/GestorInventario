<?php

namespace App\Models\Firebase;

use Exception;
use ReflectionClass;

class Model {

    static function path() : string { return ''; }

    public ?string $id = null;
 
    public function __construct(array $atributos = []) {
        $rf = new ReflectionClass($this::class);
        foreach ($atributos as $key => $value) {
            try {
                if ($rf->getProperty($key) != null && $value != null) {
                    if (str_contains($rf->getProperty($key)->getType(), 'App\Models\Firebase\Entities')
                        && gettype($value) == 'array') {
                        $name = $rf->getProperty($key)->getType().'';
                        $clase = new ReflectionClass($name);
                        $instancia = $clase->newInstance($value);
                        $this->$key = $instancia;
                    } else {
                        $this->$key = $value;
                    }
                }
            } catch (Exception $e) {}
        }
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString() {
        return json_encode($this);
    }

    public function toArray() {}
}