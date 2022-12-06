<?php

namespace Solutions\Day5;

class CrateMover
{
    public const MODEL_9000 = '9000';
    public const MODEL_9001 = '9001';

    private array $piles;

    public function __construct(
        array $pilesData,
        private readonly string $model
    )
    {
        $this->piles = [];

        foreach ($pilesData as $key => $pile) {
            $this->piles[$key + 1] = new Pile($pile);
        }
    }

    /**
     * @param array<int, Operation> $operations
     */
    public function operations(array $operations): void
    {
        $function = 'operations' . $this->model;
        $this->$function($operations);
    }

    /**
     * @param array<int, Operation> $operations
     */
    public function operations9000(array $operations): void
    {
        foreach ($operations as $operation) {

            $packages = $this->piles[$operation->pileToRemove]->remove($operation->nb);
            $this->piles[$operation->pileToAdd]->add($packages);
        }
    }
    
    /**
     * @param array<int, Operation> $operations
     */
    public function operations9001(array $operations): void
    {
        foreach ($operations as $operation) {

            $packages = $this->piles[$operation->pileToRemove]->remove($operation->nb);
            $this->piles[$operation->pileToAdd]->add9001($packages);
        }
    }

    public function getFirstPackages(): string
    {
        $response = '';

        foreach ($this->piles as $pile) {
            $response .= $pile->getLast();
        }

        return $response;
    }
}