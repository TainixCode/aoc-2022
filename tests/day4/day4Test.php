<?php

use Solutions\Day4\Section;
use Solutions\Day4\Controls;
use Solutions\Day4\Assignement;

/**
 * Tous ces tests ont été générés par GPT-Chat
 */

test('Test assignement constructor', function () {
    $assignement = new Assignement('1-5,2-4');
    $this->assertEquals(new Section(1, 5), $assignement->section1);
    $this->assertEquals(new Section(2, 4), $assignement->section2);

    $assignement = new Assignement('10-15,12-14');
    $this->assertEquals(new Section(10, 15), $assignement->section1);
    $this->assertEquals(new Section(12, 14), $assignement->section2);
});

test('Test controls contains method', function () {
    $section1 = new Section(1, 5);
    $section2 = new Section(2, 4);
    $result = Controls::contains($section1, $section2);
    $this->assertTrue($result);

    $section1 = new Section(1, 5);
    $section2 = new Section(6, 8);
    $result = Controls::contains($section1, $section2);
    $this->assertFalse($result);
});

test('Test controls overlaps method', function () {
    $section1 = new Section(1, 5);
    $section2 = new Section(2, 4);
    $result = Controls::overlaps($section1, $section2);
    $this->assertTrue($result);

    $section1 = new Section(1, 5);
    $section2 = new Section(6, 8);
    $result = Controls::overlaps($section1, $section2);
    $this->assertFalse($result);
});