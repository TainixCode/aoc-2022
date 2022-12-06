<?php

namespace Solutions\Day5;

use function PHPUnit\Framework\throwException;

class Parser
{
    /**
     * @var array<int, array<int, string>> $piles
     */
    public readonly array $piles;

    /**
     * @var array<int, Operation> $operations
     */
    public readonly array $operations;

    /**
     * @param array<int, string> $data
     */
    public function __construct(array $data)
    {
        $separatorIndex = array_search(null, $data);

        if ($separatorIndex === false) {
            throw new \Exception('La ligne vide n\'a pas été trouvée');
        }

        $columnsData = array_slice($data, 0, $separatorIndex);
        $operationsData = array_slice($data, $separatorIndex + 1);

        $this->setPiles($columnsData);
        $this->setOperations($operationsData);
    }

    /**
     * @param array<int, string> $columnsData
     */
    private function setPiles(array $columnsData): void
    {
        unset($columnsData[array_key_last($columnsData)]);

        $piles = [];
        foreach ($columnsData as $col) {
            $nPile = 0;

            $col = '_' . $col;

            for ($i = 0; $i < strlen($col); $i++) {

                if ($col[$i] === '[') {

                    $nPile = floor($i / 4);
                    $piles[$nPile][] = $col[$i+1];
                }
            }
        }

        ksort($piles);

        /** @phpstan-ignore-next-line */
        $this->piles = $piles;
    }

    /**
     * @param array<int, string> $operationsData
     */
    private function setOperations(array $operationsData): void
    {
        $operations = [];
        $regex = '/^move \d+ from \d+ to \d+$/';

        foreach ($operationsData as $operation) {

            if (! preg_match($regex, $operation)) {
                throw new \Exception('La ligneest mal formatée');
            }

            $operations[] = new Operation(
                ...sscanf($operation, 'move %d from %d to %d')
            );
        }

        /** @phpstan-ignore-next-line */
        $this->operations = $operations;
    }
}