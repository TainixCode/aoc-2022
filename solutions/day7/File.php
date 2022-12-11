<?php

namespace Solutions\Day7;

class File
{
    public function __construct(
        public readonly int $size,
        public readonly string $name
    ) { }
}