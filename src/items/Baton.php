<?php
namespace App\Items;

use Jugid\Staurie\Game\Item;

class Baton extends Item
{
    public function name(): string
    {
        return 'baton'; // ⚠️ en minuscules pour que la commande `take baton` marche
    }

    public function description(): string
    {
        return 'Un bâton magique qui semble ordinaire.';
    }

    public function statistics(): array
    {
        return [
            'atk' => 1, // +1 attaque
        ];
    }
}
