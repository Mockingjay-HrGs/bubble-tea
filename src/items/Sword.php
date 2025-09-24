<?php
namespace App\Items;

use Jugid\Staurie\Game\Item;

class Sword extends Item
{
    public function name(): string
    {
        return 'sword';
    }

    public function description(): string
    {
        return 'Une épée rouillée mais encore solide.';
    }

    public function statistics(): array
    {
        return [
            'atk' => 5,
            'durability' => 20
        ];
    }
}

