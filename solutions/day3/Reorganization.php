<?php
declare(strict_types=1);

namespace Solutions\Day3;

class Reorganization
{
    /**
     * @var array<int, Rucksack> $rucksacks
     */
    private array $rucksacks;

    /**
     * @var array<int, GroupOfElves> $groupsOfElves
     */
    private array $groupsOfElves;

    /**
     * @param array<int, string> $allItems
     */
    public function __construct(array $allItems)
    {
        $this->rucksacks = [];

        foreach ($allItems as $items) {
            $this->rucksacks[] = new Rucksack($items);
        }

        $this->setGroupsOfElves();
    }

    public function getSumOfPrioritiesItems(): int
    {
        $sum = 0;

        foreach ($this->rucksacks as $rucksack) {
            $sum += Item::getPriority($rucksack->getDouble());
        }

        return $sum;
    }

    private function setGroupsOfElves(): void
    {
        $this->groupsOfElves = [];

        $nbGroups = count($this->rucksacks) / 3;

        for ($g = 0; $g < $nbGroups; $g++) {
            $this->groupsOfElves[] = new GroupOfElves(
                array_map(
                    fn($r) => $r->items,
                    array_slice($this->rucksacks, 3 * $g, 3)
                )
            );
        }
    }

    public function getSumOfPrioritiesBadges(): int
    {
        $sum = 0;

        foreach ($this->groupsOfElves as $group) {
            $sum += Item::getPriority($group->getTriplet());
        }

        return $sum;
    }

    /**
     * @return array<int, GroupOfElves>
     */
    public function getGroupsOfElves(): array
    {
        return $this->groupsOfElves;
    }
}