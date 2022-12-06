<?php

namespace Solutions\Day5;

class Pile
{
    /**
     * @var array<int, string> $packages
     */
    private array $packages = [];

    /**
     * @param array<int, string> $packages
     */
    public function __construct(array $packages)
    {
        $this->packages = array_reverse($packages);
    }

    /**
     * @return array<int, string>
     */
    public function remove(int $nb): array
    {
        $outPackages = [];

        for ($i = 1; $i <= $nb; $i++) {
            $outPackages[] = $this->packages[array_key_last($this->packages)];
            unset($this->packages[array_key_last($this->packages)]);
        }

        return $outPackages;
    }

    /**
     * @param array<int, string> $newPackages
     */
    public function add(array $newPackages): void
    {
        $this->packages = array_merge(
            $this->packages,
            $newPackages
        );
    }

    /**
     * @param array<int, string> $newPackages
     */
    public function add9001(array $newPackages): void
    {
        $this->packages = array_merge(
            $this->packages,
            array_reverse($newPackages),
        );
    }

    public function getLast(): string
    {
        return $this->packages[array_key_last($this->packages)];
    }
}