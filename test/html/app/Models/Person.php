<?php
namespace App\Models;

class Person
{
    private $name;
    private $movements;
    private $genreMovements;

    public function __construct($name, $movements)
    {
        $this->name = $name;
        $this->movements = $movements;
        $this->genreMovements = [];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMovements()
    {
        return $this->movements;
    }

    public function setGenreMovements($genre, $genreMovements)
    {
        $this->genreMovements[$genre] = $genreMovements;
    }

    public function hasGenreMovements($genre)
    {
        return isset($this->genreMovements[$genre]);
    }

    public function getGenreMovements($genre)
    {
        return $this->genreMovements[$genre] ?? [];
    }
}
