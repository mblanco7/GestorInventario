<?php 

namespace App\Core\Types;

use Exception;
use Iterator;

abstract class AbstractList implements Iterator {

    private int $position = 0;
    private array $array = [];

    public function __construct()
    {
        $this->position = 0;
    }

    // ITERATOR
    public function current() {
        return $this->array[$this->position];
    }
    public function key(): int {
        return $this->position;
    }
    public function next(): void {
        ++$this->position;
    }
    public function rewind(): void {
        $this->position = 0;
    }
    public function valid(): bool {
        return isset($this->array[$this->position]);
    }

    // PROPIAS FUNCIONES
    public function get(int $position) {
        return isset($this->array[$position]) ? $this->array[$position] : throw new Exception("Index Out of Bounds");
    }
    protected function addA($object) : void {
        array_push($this->array, $object);
    }
    protected function setA(int $position, $object) : void {
        if (!is_null($position)) {
            $this->container[$position] = $object;
        } else {
            throw new Exception("Index Out of Bounds");
        }
    }
    public function size() : int {
        return sizeof($this->array);
    }
    public function toArray() : array{
        return $this->array;
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString() {
        return json_encode($this->array);
    }

}