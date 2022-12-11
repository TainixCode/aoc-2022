<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day8\Forest;

$forestData = Reader::getDataForDay(8, Reader::DATA);

$forest = new Forest($forestData);

echo $forest->getTotalCounted();

echo PHP_EOL;

echo $forest->getHighScenicScore();