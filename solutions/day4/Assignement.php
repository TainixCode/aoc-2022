<?php

declare(strict_types=1);

namespace Solutions\Day4;

class Assignement
{
    public readonly Section $section1;
    public readonly Section $section2;

    public function __construct(string $informations)
    {
        [$section1Start, $section1End, $section2Start, $section2End] = sscanf($informations, '%d-%d,%d-%d');

        $this->section1 = new Section($section1Start, $section1End);
        $this->section2 = new Section($section2Start, $section2End);
    }

    public function oneContainTheOther(): bool
    {
        return Controls::contains($this->section1, $this->section2)
               ||
               Controls::contains($this->section2, $this->section1);
    }

    public function oneOverlapTheOther(): bool
    {
        return Controls::overlaps($this->section1, $this->section2)
               ||
               Controls::overlaps($this->section2, $this->section1);
    }
}