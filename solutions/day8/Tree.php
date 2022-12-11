<?php

namespace Solutions\Day8;

class Tree
{
    public function __construct(
        public readonly int $height,
        public bool $counted = false
    ) { }

    /**
     * Un arbre ne peut être compté qu'une seule fois
     */
    public function counted(): void
    {
        if (! $this->counted) {
            $this->counted = true;
        }
    }
}