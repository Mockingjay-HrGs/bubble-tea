<?php
namespace App;

use App\Combat\Fighter;
use App\Inventory\Inventory;

class Player implements Fighter
{
    public function __construct(
        private string $name,
        private int $hp = 30,
        private int $baseAtk = 5,
        private int $def = 1,
        private ?Inventory $inventory = null
    ) {
        $this->inventory ??= new Inventory();
    }

    public function inventory(): Inventory { return $this->inventory; }
    public function name(): string { return $this->name; }
    public function hp(): int { return $this->hp; }
    public function isAlive(): bool { return $this->hp > 0; }
    public function defense(): int { return $this->def; }


    public function attackPower(): int
    {
        $bonus = 0;
        foreach ($this->inventory->list() as $it) {
            if (method_exists($it, 'damage')) $bonus = max($bonus, (int)$it->damage());
        }
        return $this->baseAtk + $bonus;
    }

    public function takeDamage(int $damage): void
    {
        $this->hp = max(0, $this->hp - $damage);
    }
}

