<?php


namespace App\Models;


class Fruit {
    public $name, $difficulty;
    public function __construct($name, $difficulty) {
        $this->name = $name;
        $this->difficulty = $difficulty;
    }
}