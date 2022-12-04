<?php

use Data\Reader;
use Solutions\Day1\CaloriesCounter;

$calories = Reader::getDataForDay(1, Reader::SAMPLE);
$counter = new CaloriesCounter($calories);

test('Les groupes sont bien faits', function() use ($counter) {

    $groups = $counter->getGroups();

    $this->assertEquals(
        [6000, 4000, 11000, 24000, 10000],
        $groups
    );
});

test('Partie 1 : Le maximum est bien 24000', function() use ($counter) {

    $this->assertEquals(
        24000,
        $counter->getMax()
    );
});

test('Partie 2 : Le top 3 représente bien 45000', function() use ($counter) {

    $this->assertEquals(
        45000,
        $counter->getTopThree()
    );
});