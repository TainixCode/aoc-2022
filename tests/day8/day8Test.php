<?php

use Data\Reader;
use Solutions\Day8\Forest;
use Solutions\Day8\Tree;

/**
 * TREE
 */
test('Un Arbre ne peut ête compté qu\'une seule fois', function() {

    $tree = new Tree(8);

    $this->assertFalse(
        $tree->counted
    );

    $tree->counted();

    $this->assertTrue(
        $tree->counted
    );
});


/**
 * FOREST
 */

$forestData = Reader::getDataForDay(8, Reader::SAMPLE);

test('Part 1 : Arbres visibles depuis l\'extérieur', function() use ($forestData) {

    $forest = new Forest($forestData);

    $forest->readLineTree(Forest::LEFT_RIGHT);
    $forest->readLineTree(Forest::RIGHT_LEFT);
    $forest->readLineTree(Forest::TOP_BOTTOM);
    $forest->readLineTree(Forest::BOTTOM_TOP);

    $this->assertEquals(
        21,
        $forest->getTotalCounted()
    );
});

test('Part 2 : Meilleur "score de vue"', function() use ($forestData) {

    $forest = new Forest($forestData);

    $this->assertEquals(
        8,
        $forest->getHighScenicScore()
    );
});