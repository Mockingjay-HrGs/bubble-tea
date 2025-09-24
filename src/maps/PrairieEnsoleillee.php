<?php
namespace App\Maps;

use App\Npcs\Goya;
use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Monsters\Slime;

class PrairieEnsoleillee extends Blueprint
{
    public function name(): string { return 'Prairie Ensoleillée'; }
    public function description(): string { return 'Des arbres serrés et une odeur de mousse humide.'; }
    public function position(): Position { return new Position(1, 1); } // Est
    public function npcs(): array { return [
        new Goya()
    ]; }
    public function items(): array { return []; }
    public function monsters(): array { return [ new Slime(0, 0) ]; }
}
