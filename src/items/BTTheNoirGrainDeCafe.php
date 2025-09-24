<?php
namespace App\Items;

use Jugid\Staurie\Game\Item;

class BTTheNoirGrainDeCafe extends Item
{
    public function name(): string
    {
        return 'BT Thé Noir Grain de Café';
    }

    public function description(): string
    {
        return 'Un petit paquet d’herbes médicinales fraîches.';
    }

    // Obligatoire : un tableau de stats (vide si l’item n’apporte aucun bonus)
    public function statistics(): array
    {
        return [];
    }
}
