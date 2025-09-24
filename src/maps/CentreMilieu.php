<?php
namespace App\Maps;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Monsters\Slime;

class CentreMilieu extends Blueprint
{
    public function name(): string
    {
        return 'Centre Milieu';
    }

    public function description(): string
    {
        return 'A small square with a fountain. Paths lead to Goya.';
    }

    public function position(): Position
    {
        // Coordonnées de la map sur la carte générale (0,0 pour commencer)
        return new Position(0, 0);
    }

    public function npcs(): array
    {
        return [
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
