<?php

namespace Solutions\Day5;

class Parser
{
    public readonly array $piles;
    public readonly array $operations;

    public function __construct(array $data)
    {
        $separatorIndex = array_search(null, $data);

        $columnsData = array_slice($data, 0, $separatorIndex);
        $operationsData = array_slice($data, $separatorIndex + 1);

        $this->setPiles($columnsData);
        $this->setOperations($operationsData);
    }

    private function setPiles(array $columnsData)
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

        $this->piles = $piles;
    }

    private function setOperations(array $operationsData)
    {
        $operations = [];

        foreach ($operationsData as $operation) {
            $operations[] = new Operation(
                ...sscanf($operation, 'move %d from %d to %d')
            );
        }

        $this->operations = $operations;
    }
}