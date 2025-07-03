<?php

declare(strict_types=1);

require_once __DIR__ . '/src/Entities/Player.php';
require_once __DIR__ . '/src/Entities/Monster.php';
require_once __DIR__ . '/src/Entities/Trap.php';

require_once __DIR__ . '/src/Items/Weapon.php';
require_once __DIR__ . '/src/Other/Point.php';

// initialize player

while (empty($playerName)) {
    $playerName = trim(readline("Как зовут вашего персонажа? "));
}

$player = new Player(
    name: $playerName,
    position: new Point(0, 0),
    health: 100,
    innateDamage: 1,
    weapon: new Weapon(name: 'Меч', damage: 10)
);

// initialize world
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

$isPlayerReachedExitPoint = false;

// start the game
while (!$isPlayerReachedExitPoint) {
    $distanceToExit = $player->getPosition()->calculateManhattanDistance($exitPoint);

    $playerStatus = sprintf(
        '-----------------------',
        'Статус игрока "%s":' . PHP_EOL .
        'Здоровье: %s,' . PHP_EOL .
        'Текущее оружие: %s, %s урона' . PHP_EOL .
        'Ваше местоположение: %s, %s' . PHP_EOL .
        'До выхода осталось: %s клеток' . PHP_EOL,
        '-----------------------',
        $player->getName(),
        $player->getHealth(),
        $player->getWeapon()->getName(),
        $player->getWeapon()->getDamage(),
        $player->getPosition()->getX(),
        $player->getPosition()->getY(),
        $distanceToExit
    );

    echo $playerStatus;

    // !!! NEED TO REPLACE IN MoveController
    $nextStepIsValid = false;

    while (!$nextStepIsValid) {

        $nextStepInput = trim(
            strtolower(
                readline("Куда пойдем? w(0, +1), a(-1, 0), s(0, -1), d(+1, 0): ")
            )
        );

        switch ($nextStepInput) {
            case 'w':
                $nextStepValue = ["x" => "0", "y" => "+1"];
                break;

            case 'a':
                $nextStepValue = ["x" => "-1", "y" => "+1"];
                break;

            case 's':
                $nextStepValue = ["x" => "0", "y" => "-1"];
                break;

            case 'd':
                $nextStepValue = ["x" => "+1", "y" => "0"];
                break;

            case 'end':
                exit();

            default:
                echo PHP_EOL . "Введите корректное значение!" . PHP_EOL;
                continue 2;
        }

        $playerPositionXY = $player->getPosition()->getXY();

        $playerGoesOnCoordinates = [
            "x" => $nextStepValue['x'] + $player->getPosition()->getX(),
            "y" => $nextStepValue['y'] + $player->getPosition()->getY()
        ];

        if (Point::isOutOfMap($playerGoesOnCoordinates)) {
            echo PHP_EOL . "Ты ударился в стену!" . PHP_EOL;
            continue;
        }

        $player->getPosition()->moveTo(new Point(
            $playerGoesOnCoordinates['x'],
            $playerGoesOnCoordinates['y']
        ));

        $nextStepIsValid = true;
    }

    var_dump("{$player->getPosition()->getX()} " . " {$player->getPosition()->getY()}");
}
