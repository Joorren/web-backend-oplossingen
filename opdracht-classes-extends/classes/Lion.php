<?php
/**
 * Created by PhpStorm.
 * User: Joren
 * Date: 19/10/2017
 * Time: 11:26
 */

class Lion extends Animal
{
    protected $species;

    public function __construct($name, $gender, $health, $species)
    {
        parent::__construct($name, $gender, $health);
        $this->species = $species;
    }

    public function getSpecies() {
        return $this->species;
    }

    public function doSpecialMove() {
        return "roar";
    }
}