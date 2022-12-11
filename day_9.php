<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day9\Path;

$movements = Reader::getDataForDay(9, Reader::DATA);

$path = new Path;

foreach ($movements as $movement) {
    $path->move($movement);
}

echo count($path->tail->trace->coordinates);