<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day5\CrateMover;
use Solutions\Day5\Parser;
use Solutions\Day5\Pile;

$data = Reader::getDataForDay(5, Reader::DATA);

$parser = new Parser($data);

$crateMover = new CrateMover($parser->piles, CrateMover::MODEL_9000);
$crateMover->operations($parser->operations);

echo $crateMover->getFirstPackages();

echo PHP_EOL;

$crateMover = new CrateMover($parser->piles, CrateMover::MODEL_9001);
$crateMover->operations($parser->operations);

echo $crateMover->getFirstPackages();
