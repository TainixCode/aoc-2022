<?php

declare(strict_types=1);

namespace Solutions\Day4;

class Section
{
    public function __construct(
        public readonly int $start,
        public readonly int $end,
    ) {}
}