<?php

namespace App\Models\Firebase;

class Model {

    static function path() : string { return ''; }
    static function pref() : string { return ''; }

    public ?string $id = null;
 
    public function __construct(array $atributos = []) {
        foreach ($atributos as $key => $value) {
            $this->$key = $value;
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
}