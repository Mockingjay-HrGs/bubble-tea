<?php
namespace App\Maps;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Monsters\Slime;

class Forest extends Blueprint
{
    public function name(): string { return 'Forest Edge'; }
    public function description(): string { return 'Des arbres serrés et une odeur de mousse humide.'; }
    public function position(): Position { return new Position(1, 0); }
    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return [ new Slime(0, 0) ]; }
}
