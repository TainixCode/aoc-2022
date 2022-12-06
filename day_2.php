<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day2\Party;

$data = Reader::getDataForDay(2);

// Path 1
$party = new Party($data, 'followInstructions');
$party->play();
echo $party->getScore();

echo PHP_EOL;

// Path 2
$party = new Party($data, 'haveTo');
$party->play();
echo $party->getScore();
