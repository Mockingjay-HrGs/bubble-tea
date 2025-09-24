<?php
namespace App\Items;

use Jugid\Staurie\Game\Item;

class HerbBundle extends Item
{
    public function name(): string
    {
        return 'Herb Bundle';
    }

    public function description(): string
    {
        return 'Un petit paquet d’herbes médicinales fraîches.';
    }

    public function statistics(): array
    {
        return [];
    }
}
