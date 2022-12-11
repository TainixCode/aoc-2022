<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day8\Forest;

$forestData = Reader::getDataForDay(8, Reader::DATA);

$forest = new Forest($forestData);

$forest->readLineTree(Forest::LEFT_RIGHT);
$forest->readLineTree(Forest::RIGHT_LEFT);
$forest->readLineTree(Forest::TOP_BOTTOM);
$forest->readLineTree(Forest::BOTTOM_TOP);

echo $forest->getTotalCounted();

echo PHP_EOL;

echo $forest->getHighScenicScore();