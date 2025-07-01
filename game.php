<?php

declare(strict_types=1);

require_once __DIR__ . '/src/Entities/Player.php';
require_once __DIR__ . '/src/Entities/Monster.php';
require_once __DIR__ . '/src/Entities/Trap.php';

require_once __DIR__ . '/src/Items/Weapon.php';
require_once __DIR__ . '/src/Other/Point.php';


$player = new Player(
    name: readline("Как зовут вашего персонажа? "),
    position: new Point(0, 0),
    health: 100,
    innateDamage: 1,
    weapon: new Weapon(name: 'Меч', damage: 10)
);

$objectsOnMap = [
    new Monster(
        name: 'Орк',
        position: new Point(7, 7),
        health: 30,
        innateDamage: 5,
        weapon: new Weapon(name: 'Дубинка', damage: 5)
    ),
    new Monster(
        name: 'Разъяренная гончая',
        position: new Point(5, 0),
        health: 15,
        innateDamage: 5,
    ),
    new Monster(
        name: 'Гадкий гоблин',
        position: new Point(7, 6),
        health: 25,
        innateDamage: 1,
        weapon: new Weapon(name: 'Кинжал', damage: 2)
    ),
    new Monster(
        name: 'Разъяренная гончая',
        position: new Point(2, 4),
        health: 15,
        innateDamage: 5,
    ),
    new Monster(
        name: 'Слизняк',
        position: new Point(3, 3),
        health: 5,
        innateDamage: 5,
    )
];

$exitPoint = new Point(
    x: random_int(8, 10),
    y: random_int(8, 10),
);

// while (true) {
$distanceToExit = $player->getPosition()->calculateManhattanDistance($exitPoint);

$playerStatus = printf(
    'Статус игрока "%s":' . PHP_EOL .
    'Здоровье: %s,' . PHP_EOL .
    'Текущее оружие: %s, %s урона' . PHP_EOL .
    'До выхода осталось: %s клеток' . PHP_EOL,
    $player->getName(),
    $player->getHealth(),
    $player->getWeapon()->getName(),
    $player->getWeapon()->getDamage(),
    $distanceToExit
);
// }
