<?php
declare(strict_types=1);

namespace Solutions\Day3;

class GroupOfElves
{
    /**
     * @var array<int, Rucksack> $rucksacks
     */
    private array $rucksacks;

    /**
     * @param array<int, string> $allItems
     */
    public function __construct(array $allItems)
    {
        $this->rucksacks = [];

        foreach ($allItems as $items) {
            $this->rucksacks[] = new Rucksack($items);
        }
    }

    public function getTriplet(): string
    {
        /**
         * @var array<int, array<int, string>> $itemsInArrays
         */
        $itemsInArrays = array_map(
            fn($r) => str_split($r->items),
            $this->rucksacks
        );

        $similar = array_intersect(
            ...$itemsInArrays
        );

        return $similar[array_key_first($similar)];
    }
}