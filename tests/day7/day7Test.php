<?php

/**
 * Command
 */

use Data\Reader;
use Solutions\Day7\Command;
use Solutions\Day7\Explorer;

test('Extraction des informations pour se déplacer dans un dossier', function() {

    $line = '$ cd dir2';

    $command = new Command($line);

    $this->assertEquals(
        Command::CD,
        $command->type
    );

    $this->assertEquals(
        'dir2',
        $command->information
    );
});

test('Extraction des informations pour se déplacer dans un dossier - cas particulier "cd" dans le nom du dossier', function() {

    $line = '$ cd dicdr4';

    $command = new Command($line);

    $this->assertEquals(
        Command::CD,
        $command->type
    );

    $this->assertEquals(
        'dicdr4',
        $command->information
    );
});

test('Extraction des informations remonter d\'un dossier', function() {

    $line = '$ cd ..';

    $command = new Command($line);

    $this->assertEquals(
        Command::CD,
        $command->type
    );

    $this->assertEquals(
        Command::UP,
        $command->information
    );
});

test('Extraction des informations lister un dossier', function() {

    $line = '$ ls';

    $command = new Command($line);

    $this->assertEquals(
        Command::LS,
        $command->type
    );
});

test('Extraction des informations détails d\'un dossier', function() {

    $line = 'dir abcd';

    $command = new Command($line);

    $this->assertEquals(
        Command::DIR_INFO,
        $command->type
    );

    $this->assertEquals(
        'abcd',
        $command->information
    );
});

test('Extraction des informations détails d\'un dossier - cas particulier "dir" dans le nom du dossier', function() {

    $line = 'dir abdircd2';

    $command = new Command($line);

    $this->assertEquals(
        Command::DIR_INFO,
        $command->type
    );

    $this->assertEquals(
        'abdircd2',
        $command->information
    );
});

test('Extraction des informations détails d\'un fichier', function() {

    $line = '12345 file.txt';

    $command = new Command($line);

    $this->assertEquals(
        Command::FILE_INFO,
        $command->type
    );

    $this->assertEquals(
        '12345 file.txt',
        $command->information
    );
});



/**
 * Explorer
 */

$commands = Reader::getDataForDay(7, Reader::SAMPLE);
unset($commands[0]);

test('Part 1 : Somme des petits dossiers', function() use ($commands) {

    $explorer = new Explorer($commands);
    $explorer->execute();

    $this->assertEquals(
        95437,
        $explorer->getSumSizeOfSmallFolders()
    );
});

test('Part 2 : Plus petit espace à libérer', function() use ($commands) {

    $explorer = new Explorer($commands);
    $explorer->execute();

    $this->assertEquals(
        24933642,
        $explorer->getMinSizeFolderToHaveEnoughPlaceOnDisk()
    );
});