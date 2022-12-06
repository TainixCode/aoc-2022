<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day4\Assignement;

$allSections = Reader::getDataForDay(4);

$cpt = 0;

foreach ($allSections as $sectionInformations) {
    $assignement = new Assignement($sectionInformations);

    $cpt += (int) $assignement->oneOverlapTheOther();
}

echo $cpt;