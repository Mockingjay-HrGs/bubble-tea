<?php

namespace App\Items;

use Jugid\Staurie\Game\Item_Equippable;

class Sarbacane extends Item_Equippable
{
    public function name(): string
    {
        return 'Sarbacane';
    }

    public function description(): string
    {
        return 'Une sarbacane rudimentaire qui marche plutot bien.';
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


