<?php

namespace DC\AdventureGame;

use DC\AdventureGame\Exception\PositionDoesNotExistException;


class Position
{
    private $neighbours;
    private $description;

    public function __construct(array $neighbours = [], $description = null)
    {
        $this->neighbours = $neighbours;
        $this->description = $description;
    }

    public function getNeighbour($neighbour) 
    {
        if (!isset($this->neighbours[$neighbour])) {
            throw new PositionDoesNotExistException($neighbour);
            
        }
        return $this->neighbours[$neighbour];
    }

    public function getDescription() 
    {
        return $this->description;
    }

}