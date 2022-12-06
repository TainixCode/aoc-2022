<?php

namespace Solutions\Day2;

interface StrategyInterface
{
    public const ROCK = 'R';
    public const PAPER = 'P';
    public const SCISSORS = 'S';

    public const SCORES = [
        self::ROCK => 1,
        self::PAPER => 2,
        self::SCISSORS => 3
    ];

    public const CORRESPONDANCES = [
        'A' => self::ROCK,
        'B' => self::PAPER,
        'C' => self::SCISSORS,
    
        'X' => self::ROCK,
        'Y' => self::PAPER,
        'Z' => self::SCISSORS,
    ];

    public static function play(string $vilain, string $me): int;
}