<?php

namespace Solutions\Day9;

class Point
{
    public int $x = 0;
    public int $y = 0;

    public const RIGHT = 'R';
    public const LEFT = 'L';
    public const UP = 'U';
    public const DOWN = 'D';

    public Trace $trace;

    public function __construct()
    {
        $this->trace = new Trace;
        $this->trace->addCoordinate($this->x, $this->y);
    }

    public function move(string $direction): void
    {
        if ($direction === self::RIGHT) {
            $this->x++;
        }

        if ($direction === self::LEFT) {
            $this->x--;
        }

        if ($direction === self::UP) {
            $this->y++;
        }

        if ($direction === self::DOWN) {
            $this->y--;
        }

        $this->trace->addCoordinate($this->x, $this->y);
    }

    public function follow(int $x, int $y, string $direction): void
    {
        // Je suis sur la même ligne
        if ($y === $this->y) {

            // Si distance > 1
            if (abs($this->x - $x) > 1) {

                // A droite
                if ($x > $this->x) {
                    $this->x++;
                } else {
                    // A gauche
                    $this->x--;
                }
            }
            
            $this->trace->addCoordinate($this->x, $this->y);
            return;
        }

        // Je suis sur la même colonne
        if ($x === $this->x) {

            // Si distance > 1
            if (abs($this->y - $y) > 1) {

                // A droite
                if ($y > $this->y) {
                    $this->y++;
                } else {
                    // A gauche
                    $this->y--;
                }
            }
            
            $this->trace->addCoordinate($this->x, $this->y);
            return;
        }

        // Diagonale ??

        // Si collé, alors il bouge pas ------------------------------
        $distance = abs($x - $this->x) + abs($y - $this->y);
        if ($distance === 2) {
            return;
        }
        // ------------------------------------------------------------

        // Sinon, selon le déplacement
            // S'il monte, on le met en dessous
            if ($direction === Point::UP) {
                $this->y = $y - 1;
                $this->x = $x;
            }
            
            // S'il descend, on le met au dessus
            if ($direction === Point::DOWN) {
                $this->y = $y + 1;
                $this->x = $x;
            }
            
            // S'il va à gauche, on le met à droite
            if ($direction === Point::LEFT) {
                $this->y = $y;
                $this->x = $x + 1;
            }
            
            // S'il va à droite, on le met à gauche
            if ($direction === Point::RIGHT) {
                $this->y = $y;
                $this->x = $x - 1;
            }
            
            $this->trace->addCoordinate($this->x, $this->y);
    }
}