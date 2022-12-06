<?php
declare(strict_types=1);

namespace Solutions\Day3;

class Item
{
    public static function getPriority(string $item): int
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $alphabet = $alphabet . strtoupper($alphabet);
        $alphabet = str_split($alphabet);
        
        return array_search($item, $alphabet) + 1;
    }
}