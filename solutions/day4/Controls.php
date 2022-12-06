<?php

declare(strict_types=1);

namespace Solutions\Day4;

class Controls
{
    public static function contains(Section $section1, Section $section2): bool
    {
        return  $section1->start <= $section2->start
                &&
                $section1->end >= $section2->end;
    }

    public static function overlaps(Section $section1, Section $section2): bool
    {
        $range1 = range($section1->start, $section1->end);
        $range2 = range($section2->start, $section2->end);

        return ! empty(array_intersect($range1, $range2));
    }
}