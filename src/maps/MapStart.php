<?php
namespace App\Maps;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npcs\OldSage;
use App\Items\WoodenShield;
use App\Monsters\Slime;

class MapStart extends Blueprint
{
    public function name(): string
    {
        return 'Village Square';
    }

    public function description(): string
    {
        return 'A small square with a fountain. Paths lead to the forest.';
    }

    public function position(): Position
    {
        return new Position(0, 0);
    }

    public function npcs(): array
    {
        return [
            new OldSage(0, 0),
        ];
    }

    public function items(): array
    {
        return [
        ];
    }

    public function monsters(): array
    {
        return [
            new Slime(1, 0),
        ];
    }
}
