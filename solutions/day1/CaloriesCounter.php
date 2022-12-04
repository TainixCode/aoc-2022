<?php
declare(strict_types=1);

namespace Solutions\Day1;

class CaloriesCounter
{
    /**
     * @var array<int, int> $groups
     */
    private array $groups;

    /**
     * @param array<int, ?int> $calories
     */
    public function __construct(
        private array $calories
    ) {
        $this->setGroups();
    }

    private function setGroups(): void
    {
        $current = 0;
        $this->groups = [];

        foreach ($this->calories as $calories) {
            
            if (is_null($calories)) {
                $this->groups[] = $current;
                $current = 0;
                continue;
            }

            $current += (int) $calories;
        }

        // Le dernier
        $this->groups[] = $current;
    }
    
    /**
     * @return array<int, int>
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    public function getMax(): int|false
    {
        return max($this->groups);
    }

    public function getTopThree(): mixed
    {
        return collect($this->groups)->sortDesc()->slice(0, 3)->sum();
    }
}