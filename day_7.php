<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day7\Explorer;

$commands = Reader::getDataForDay(7, Reader::DATA);

unset($commands[0]); // Toujours 'cd /'

$explorer = new Explorer($commands);
$explorer->execute();

echo $explorer->getSumSizeOfSmallFolders();

echo PHP_EOL;

echo $explorer->getMinSizeFolderToHaveEnoughPlaceOnDisk();