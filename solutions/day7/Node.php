<?php

namespace Solutions\Day7;

class Node
{
    /**
     * @var array <int, Node> $childrens
     */
    public array $childrens = [];

    /**
     * @var array<int, File> $files
     */
    public array $files = [];

    public Node $current;

    public function __construct(
        public readonly string $name,
        public ?Node $parent = null
    ) {
        $this->current = $this;
    }

    public function addFolder(string $name): void
    {
        $this->current->childrens[] = new Node(
            $name,
            $this->current // Le parent de l'enfant est l'objet courant
        );
    }

    public function addFile(string $informations): void
    {
        [$size, $name] = explode(' ', $informations);

        $this->current->files[] = new File(
            (int) $size,
            $name
        );
    }

    public function setToChild(string $name): void
    {
        foreach ($this->current->childrens as $child) {

            if ($child->name === $name) {
                $this->current = $child;
                return;
            }
        }

        throw new \Exception('Aucun enfant correspondant');
    }

    public function setToParent(): void
    {
        if ($this->current->parent === null) {
            return;
        }

        $this->current = $this->current->parent;
    }

    public function getTotalSize(): int
    {
        $total = 0;
        
        // Fichiers des enfants, récursivité
        foreach ($this->childrens as $child) {
            $total += $child->getTotalSize();
        }

        // Fichiers du noeud courant
        foreach ($this->files as $file) {
            $total += $file->size;
        }

        return $total;
    }

    /**
     * @return array<int, array{name: string, size: int}>
     */
    public function getFoldersDetails(): array
    {
        $details = [];

        $details[] = [
            'name' => $this->name,
            'size' => $this->getTotalSize()
        ];

        $childrens = [];

        foreach ($this->childrens as $children) {
            $childrens[] = $children->getFoldersDetails();
        }

        return array_merge($details, ...$childrens);
    }
}

