<?php

declare(strict_types=1);

namespace Solutions\Day4;

use Solutions\Day4\Assignement;

class Organization
{
    /**
     * @param array<int, string> $sectionsInformations
     */
    public function __construct(
        private array $sectionsInformations
    ) {}

    public function getCounterContains(): int
    {
        $counter = 0;

        foreach ($this->sectionsInformations as $sectionInformation) {
            $assignement = new Assignement($sectionInformation);
            $counter += (int) $assignement->oneContainTheOther();
        }

        return $counter;
    }

    public function getCounterOverlaps(): int
    {
        $counter = 0;

        foreach ($this->sectionsInformations as $sectionInformation) {
            $assignement = new Assignement($sectionInformation);
            $counter += (int) $assignement->oneOverlapTheOther();
        }

        return $counter;
    }
}