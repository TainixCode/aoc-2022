<?php

namespace Solutions\Day2;

use Solutions\Day2\StrategyInterface;

class StrategyFollowInstructions implements StrategyInterface
{
    public static function play(string $vilain, string $me): int
    {
        $vilain = self::CORRESPONDANCES[$vilain];
        $me = self::CORRESPONDANCES[$me];

        $score = self::SCORES[$me];

        // Draw
        if ($vilain == $me) {
            return $score += 3;
        }

        // Win
        $winnings = [
            self::ROCK . self::SCISSORS,
            self::SCISSORS . self::PAPER,
            self::PAPER . self::ROCK
        ];

        if (in_array($me . $vilain, $winnings)) {
            return $score += 6;
        }

        // Loss
        return $score;
    }
}