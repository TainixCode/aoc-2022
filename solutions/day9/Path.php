<?php

namespace Solutions\Day9;

class Path
{
    public Point $head;
    public Point $tail;

    public function __construct()
    {
        $this->head = new Point;
        $this->tail = new Point;
    }

    public function move(string $informations): void
    {
        [$direction, $nb] = explode(' ', $informations);

        for ($i = 1; $i <= $nb; $i++) {
            $this->head->move($direction);
            $this->tail->follow($this->head->x, $this->head->y, $direction);
        }
    }
}