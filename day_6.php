<?php

require './vendor/autoload.php';

use Data\Reader;

$lines = Reader::getDataForDay(6, Reader::DATA);

function search($line, $length)
{
    // index max pour ne pas dépasser la fin de la chaine
    $end = strlen($line) - $length + 1;

    for ($i = 0; $i <= $end ; $i++) {
        $slice = substr($line, $i, $length);

        // str_split : transforme la chaine en tableau
        // array_unique : retire les doublons
        // Si le count est égal à la longueur, c'est qu'il n'y a pas de doublon
        // Donc tous les caractères sont uniques
        if (count(array_unique(str_split($slice))) === $length) {
            // Position après la portion analysée
            return $i + $length;
        }
    }
}

echo search($lines[0], 4) . PHP_EOL;
echo search($lines[0], 14) . PHP_EOL;