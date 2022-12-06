<?php

namespace Solutions\Day2;

use Solutions\Day2\StrategyInterface;

class StrategyHaveTo implements StrategyInterface
{
    public static function play(string $vilain, string $me): int
    {
        $vilain = self::CORRESPONDANCES[$vilain];

        $matchingScores = [
            // Have to lose
            'X' => 0,
            // Have to draw
            'Y' => 3,
            // Have to win
            'Z' => 6
        ];

        $score = $matchingScores[$me];

        $matchingPlay = [
            // Have to lose
            'X' => [
                self::ROCK => self::SCISSORS,
                self::SCISSORS => self::PAPER,
                self::PAPER => self::ROCK
            ],
            // Have to draw
            'Y' => [
                self::ROCK => self::ROCK,
                self::SCISSORS => self::SCISSORS,
                self::PAPER => self::PAPER
            ],
            // Have to win
            'Z' => [
                self::ROCK => self::PAPER,
                self::PAPER => self::SCISSORS,
                self::SCISSORS => self::ROCK
            ]
        ];

        $me = $matchingPlay[$me][$vilain];

        return $score + self::SCORES[$me];
    }
}