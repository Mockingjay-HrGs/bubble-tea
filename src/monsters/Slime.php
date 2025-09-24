<?php
namespace App\Monsters;

use Jugid\Staurie\Game\Monster;

class Slime extends Monster
{
    public function name(): string
    {
        return 'Green Slime';
    }

    public function description(): string
    {
        return 'A wobbling blob of goo. Harmless… but sticky.';
    }

    public function level(): int
    {
        return 1;
    }

    public function health_points(): int
    {
        return 6;
    }

    public function defense(): int
    {
        return 0;
    }

    public function experience(): int
    {
        return 3;
    }

    public function skills(): array
    {
        return [
            [
                'name'   => 'Poke',
                'damage' => 1
            ],
        ];
    }
}
