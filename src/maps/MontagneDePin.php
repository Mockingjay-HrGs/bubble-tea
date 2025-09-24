<?php
namespace App\Maps;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Items\HerbBundle;

class MontagneDePin extends Blueprint
{
    public function name(): string { return 'Montagne de Pin'; }
    public function description(): string { return 'Une berge calme. Des herbes aromatiques poussent ici.'; }
    public function position(): Position { return new Position(-1, -1); } // Sud (si ça ne marche pas, essaye north)
    public function npcs(): array { return []; }
    public function items(): array { return [ new HerbBundle(0, 0) ]; }
    public function monsters(): array { return []; }
}