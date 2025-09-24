<?php
namespace App\Maps;

use App\Npcs\Mizutani;
use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Items\HerbBundle;

class PlaineDeCerisier extends Blueprint
{
    public function name(): string { return 'Plaine de Cerisier'; }
    public function description(): string { return 'Une berge calme. Des herbes aromatiques poussent ici.'; }
    public function position(): Position { return new Position(1, 0); } // Sud (si ça ne marche pas, essaye north)
    public function npcs(): array { return [
        new Mizutani()
    ]; }
    public function items(): array { return [ new HerbBundle(0, 0) ]; }
    public function monsters(): array { return []; }
}

