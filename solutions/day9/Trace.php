<?php

namespace Solutions\Day9;

class Trace
{
    /**
     * @var array<int, string> $coordinates
     */
    public array $coordinates = [];

    public function addCoordinate(int $x, int $y): void
    {
        if (!in_array($x . '_' . $y, $this->coordinates)) {
            $this->coordinates[] = $x . '_' . $y;
        }
    }

    public function getNbCoordinates(): int
    {
        return count($this->coordinates);
    }
}