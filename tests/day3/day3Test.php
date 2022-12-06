<?php

use Data\Reader;
use Solutions\Day3\Item;
use Solutions\Day3\Rucksack;
use Solutions\Day3\GroupOfElves;
use Solutions\Day3\Reorganization;

/**
 * Test Item.php
 */
test('Association de priorité', function(string $item, int $expectedPriority) {

    $this->assertEquals(
        $expectedPriority,
        Item::getPriority($item)
    );

})->with([
    ['a', 1],
    ['b', 2],
    ['z', 26],
    ['A', 27],
    ['B', 28],
    ['Z', 52]
]);

/**
 * Test Rucksack.php
 */
test('Compartiments bien découpés', function() {

    $rucksack = new Rucksack('abcdefgh');

    $this->assertEquals(
        ['abcd', 'efgh'],
        $rucksack->getCompartiments()
    );
});

test('doublon bien trouvé', function(string $items, string $expectedDouble) {

    $rucksack = new Rucksack($items);

    $this->assertEquals(
        $expectedDouble,
        $rucksack->getDouble()
    );

})->with([
    ['vJrwpWtwJgWrhcsFMMfFFhFp', 'p'],
    ['jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL', 'L'],
    ['PmmdzqPrVvPwwTWBwg', 'P']
]);

/**
 * Test Reorganization.php
 */

$allItems = Reader::getDataForDay(3, Reader::SAMPLE);

test('Part 1 : Jeu de données de test complet', function() use($allItems) {

    $reorganization = new Reorganization($allItems);

    $this->assertEquals(
        157,
        $reorganization->getSumOfPrioritiesItems()
    );
});

test('Part 2 : découpage des groupes des elfes', function() use($allItems) {

    $reorganization = new Reorganization($allItems);

    $this->assertEquals(
        [
            new GroupOfElves(['vJrwpWtwJgWrhcsFMMfFFhFp', 'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL', 'PmmdzqPrVvPwwTWBwg']),
            new GroupOfElves(['wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn', 'ttgJtRGJQctTZtZT', 'CrZsJsPPZsGzwwsLwLmpwMDw'])
        ],
        $reorganization->getGroupsOfElves()
    );
});

/**
 * Test GroupOfElves.php
 */
test('Part 2 : triplet bien trouvé', function() {

    $groupsOfElves = new GroupOfElves(['vJrwpWtwJgWrhcsFMMfFFhFp', 'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL', 'PmmdzqPrVvPwwTWBwg']);

    $this->assertEquals(
        'r',
        $groupsOfElves->getTriplet()
    );
});

test('Part 2 : Jeu de données de test complet', function() use($allItems) {

    $reorganization = new Reorganization($allItems);

    $this->assertEquals(
        70,
        $reorganization->getSumOfPrioritiesBadges()
    );
});