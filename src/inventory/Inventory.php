<?php
namespace App\Inventory;

use App\Items\Item;

class Inventory
{
    private array $items = [];
    private int $capacity;

    public function __construct(int $capacity = 20)
    {
        $this->capacity = $capacity;
    }

    public function add($item): bool
    {
        if ($this->isFull()) {
            return false;
        }
        $this->items[] = $item;
        return true;
    }

    public function remove(string $name): ?object
    {
        foreach ($this->items as $index => $item) {
            if (method_exists($item, 'name') && $item->name() === $name) {
                unset($this->items[$index]);
                $this->items = array_values($this->items);
                return $item;
            }
        }
        return null;
    }

    public function list(): array
    {
        return $this->items;
    }

    public function show(): void
    {
        if (empty($this->items)) {
            echo "Ton inventaire est vide.\n";
        } else {
            echo "Inventaire :\n";
            foreach ($this->items as $item) {
                $name = method_exists($item, 'name') ? $item->name() : get_class($item);
                echo "- $name\n";
            }
        }
    }

    public function isFull(): bool
    {
        return count($this->items) >= $this->capacity;
    }
}
