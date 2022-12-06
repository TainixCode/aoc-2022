<?php

namespace Solutions\Day5;

class Operation
{
    public function __construct(
        public readonly int $nb,
        public readonly int $pileToRemove,
        public readonly int $pileToAdd
    ) {}
}