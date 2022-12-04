<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day1\CaloriesCounter;

$calories = Reader::getDataForDay(1);
$counter = new CaloriesCounter($calories);

echo $counter->getMax();
echo PHP_EOL;
echo $counter->getTopThree();