<?php

namespace App\Items;

use Jugid\Staurie\Game\Item_Equippable;

class Torch extends Item_Equippable
{
    public function name(): string
    {
        return 'Torch';
    }

    public function description(): string
    {
        return 'Une torche rudimentaire qui éclaire bien.';
    }

    public function body_part(): string
    {
        return 'hand';
    }

    public function statistics(): array
    {
        return ['ability' => 1];
    }
}

