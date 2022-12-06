<?php

namespace Solutions\Day2;

class Party
{
    private int $score = 0;

    /**
     * @param array<int, string> $data
     */
    public function __construct(
        private array $data,
        private string $strategy
    ) {}

    public function play(): void
    {
        foreach ($this->data as $play) {
            $strategy = 'Solutions\\Day2\\Strategy' . ucfirst($this->strategy);
            $this->score += $strategy::play(...explode(' ', $play));
        }
    }

    public function getScore(): int
    {
        return $this->score;
    }
}