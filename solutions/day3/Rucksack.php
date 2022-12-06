<?php
declare(strict_types=1);

namespace Solutions\Day3;

class Rucksack
{
    private string $compartiment1;
    private string $compartiment2;

    public function __construct(
        public readonly string $items
    )
    {
        $this->split();
    }

    private function split(): void
    {
        $half = (int) (strlen($this->items) / 2);

        $this->compartiment1 = substr($this->items, 0, $half);
        $this->compartiment2 = substr($this->items, $half);
    }

    /**
     * @return array<int, string>
     */
    public function getCompartiments(): array
    {
        return [$this->compartiment1, $this->compartiment2];
    }

    public function getDouble(): string
    {
        $intersect = array_intersect(
            str_split($this->compartiment1),
            str_split($this->compartiment2)
        );

        return $intersect[array_key_first($intersect)];
    }
}
