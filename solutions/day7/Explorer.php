<?php

namespace Solutions\Day7;

class Explorer
{
    private const SIZE_DISK_MAX = 70000000;
    private const SIZE_DISK_NEEDED = 30000000;
    
    private const SIZE_LIMIT_SMALL_FOLDER = 100000;

    private Node $node;

    public function __construct(
        /**
         * @var array<int, string> $commands
         */
        private array $commands
    )
    {
        $this->node = new Node('/');
    }

    public function execute(): void
    {
        foreach ($this->commands as $commandInformations) {
    
            $command = new Command($commandInformations);
            
            if ($command->type === Command::CD) {
        
                if ($command->information == Command::UP) {
                    $this->node->setToParent();
                    continue;
                }
        
                $this->node->setToChild($command->information);
            }
        
            if ($command->type === Command::DIR_INFO) {
                $this->node->addFolder($command->information);
            }
        
            if ($command->type === Command::FILE_INFO) {
                $this->node->addFile($command->information);
            }
        }
    }

    public function getSumSizeOfSmallFolders(): int
    {
        $sum = 0;

        foreach ($this->node->getFoldersDetails() as $folder) {
            if ($folder['size'] <= self::SIZE_LIMIT_SMALL_FOLDER) {
                $sum += $folder['size'];
            }
        }

        return $sum;
    }

    public function getMinSizeFolderToHaveEnoughPlaceOnDisk(): int
    {
        $occupied = $this->node->getTotalSize();

        $unused = self::SIZE_DISK_MAX - $occupied;
        $neededMore = self::SIZE_DISK_NEEDED - $unused;

        $possibilities = [$occupied]; // Pour être sûr d'avoir toujours un min à retourner
        
        foreach ($this->node->getFoldersDetails() as $folder) {
            if ($folder['size'] >= $neededMore) {
                $possibilities[] = $folder['size'];
            }
        }

        return min($possibilities);
    }
}