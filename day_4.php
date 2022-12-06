<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day4\Organization;

$allSections = Reader::getDataForDay(4);

$organization = new Organization($allSections);

echo $organization->getCounterContains();

echo PHP_EOL;

echo $organization->getCounterOverlaps();