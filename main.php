<?php

use Jugid\Staurie\Component\Character\MainCharacter;
use Jugid\Staurie\Component\Console\Console;
use Jugid\Staurie\Component\Introduction\Introduction;
use Jugid\Staurie\Component\Inventory\Inventory;
use Jugid\Staurie\Component\Level\Level;
use Jugid\Staurie\Component\Map\Map;
use Jugid\Staurie\Component\Menu\Menu;
use Jugid\Staurie\Component\Money\Money;
use Jugid\Staurie\Component\PrettyPrinter\PrettyPrinter;
use Jugid\Staurie\Staurie;

require __DIR__ . '/vendor/autoload.php';

$staurie = new Staurie('Example lands');

$staurie->register([
    Console::class,
    PrettyPrinter::class,
    Inventory::class,
    Level::class
]);

$container = $staurie->getContainer();

/* Menu */
$menu = $container->registerComponent(Menu::class);
$menu->configuration([
    'text'=> 'Welcome to this awesome test adventure',
    'labels'=> [
        'new_game' => 'Enter the world',
        'quit'=> 'Exit game',
    ]
]);

/* Personnage (si la classe existe dans ta version) */
$character = $container->registerComponent(MainCharacter::class);
$character->configuration([
    'ask_name' => false,
    'ask_gender' => false,
    'character_has_name' => true,
    'character_has_gender' => true,
]);

/* Map — CHEMIN + NAMESPACE CORRIGÉS */
$map = $container->registerComponent(Map::class);
$map->configuration([
    'directory'      => __DIR__ . '/src/maps',
    'namespace'      => 'App\\Maps',
    'navigation'     => true,
    'map_enable'     => true,
    'compass_enable' => true,
    'x_start'        => 0,
    'y_start'        => 0,
]);

/* Introduction */
$introduction = $container->registerComponent(Introduction::class);
$introduction->configuration([
    'text'=>[
        'This is an introduction to test the introduction component',
        'You can use it multiline by using an array in configuration'
    ],
    'title'=>'Chapter 1 : The new game',
    'scrolling'=>false
]);

/* Money */
$money = $container->registerComponent(Money::class);
$money->configuration([
    'name' => 'Bubble',
    'start_with' => 100
]);

$staurie->run();
