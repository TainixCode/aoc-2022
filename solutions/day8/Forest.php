<?php

namespace Solutions\Day8;

class Forest
{
    /**
     * @var array<string, Tree> $trees
     */
    private array $trees;

    private int $xMax;
    private int $yMax;
     
    /**
     * @param array<int, string> $data
     */
    public function __construct(array $data)
    {
        $this->xMax = count($data) - 1;
        $this->yMax = strlen($data[0]) - 1;

        foreach ($data as $xTree => $line) {
            foreach (str_split($line) as $yTree => $heightTree) {

                $heightTree = (int) $heightTree;

                $counted = ($xTree == 0 || $yTree == 0 || $xTree == $this->xMax || $yTree == $this->yMax);
                $this->trees[$xTree . '_' . $yTree] = new Tree($heightTree, $counted);
            }
        }

        $this->readLinesTrees();
    }

    private function readLinesTrees(): void
    {
        // LEFT TO RIGHT
        for ($x = 0; $x <= $this->xMax; $x++) {

            $start = 0;

            for ($y = 0; $y <= $this->yMax; $y++) {

                if ($this->trees[$x . '_' . $y]->height > $start) {
                    $this->trees[$x . '_' . $y]->counted();
                    $start = $this->trees[$x . '_' . $y]->height;
                }
            }
        }

        // RIGHT TO LEFT
        for ($x = 0; $x <= $this->xMax; $x++) {

            $start = 0;

            for ($y = $this->yMax; $y >= 0; $y--) {

                if ($this->trees[$x . '_' . $y]->height > $start) {
                    $this->trees[$x . '_' . $y]->counted();
                    $start = $this->trees[$x . '_' . $y]->height;
                }
            }
        }

        // TOP TO BOTTOM
        for ($y = 0; $y <= $this->yMax; $y++) {

            $start = 0;

            for ($x = 0; $x <= $this->xMax; $x++) {

                if ($this->trees[$x . '_' . $y]->height > $start) {
                    $this->trees[$x . '_' . $y]->counted();
                    $start = $this->trees[$x . '_' . $y]->height;
                }
            }
        }

        // BOTTOM TO TOP
        for ($y = 0; $y <= $this->yMax; $y++) {

            $start = 0;

            for ($x = $this->xMax; $x >= 0; $x--) {

                if ($this->trees[$x . '_' . $y]->height > $start) {
                    $this->trees[$x . '_' . $y]->counted();
                    $start = $this->trees[$x . '_' . $y]->height;
                }
            }
        }
    }

    public function getTotalCounted(): int
    {
        $nb = 0;

        foreach ($this->trees as $tree) {
            $nb += (int) $tree->counted;
        }

        return $nb;
    }

    public function scenicScore(int $xStart, int $yStart): int
    {
        if ($xStart === 0 || $yStart === 0) {
            return 0;
        }

        $startHeight = $this->trees[$xStart . '_' . $yStart]->height;

        // LEFT
        $left = 0;
        $x = $xStart - 1;
        while ($x >= 0) {
            $left++;

            if ($this->trees[$x . '_' . $yStart]->height >= $startHeight) {
                break;
            }

            $x--;
        }

        // RIGHT
        $right = 0;
        $x = $xStart + 1;
        while ($x <= $this->xMax) {
            $right++;

            if ($this->trees[$x . '_' . $yStart]->height >= $startHeight) {
                break;
            }

            $x++;
        }

        // TOP
        $top = 0;
        $y = $yStart - 1;
        while ($y >= 0) {
            $top++;

            if ($this->trees[$xStart . '_' . $y]->height >= $startHeight) {
                break;
            }

            $y--;
        }
        
        // BOTTOM
        $bottom = 0;
        $y = $yStart + 1;
        while ($y <= $this->yMax) {
            $bottom++;

            if ($this->trees[$xStart . '_' . $y]->height >= $startHeight) {
                break;
            }

            $y++;
        }

        // echo " - $top * $left * $bottom * $right  - ";
        return $left * $right * $top * $bottom;
    }

    public function getHighScenicScore(): int
    {
        $max = 0;

        for ($x = 0; $x <= $this->xMax; $x++) {
            for ($y = 0; $y <= $this->yMax; $y++) {

                $max = max(
                    $max,
                    $this->scenicScore($x, $y)
                );
            }
        }

        return $max;
    }
}