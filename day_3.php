<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day3\Reorganization;

$allItems = Reader::getDataForDay(3);
$reorganization = new Reorganization($allItems);

// Part 1
echo $reorganization->getSumOfPrioritiesItems();

echo PHP_EOL;

// Part 2
echo $reorganization->getSumOfPrioritiesBadges();