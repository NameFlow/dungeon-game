<?php

declare(strict_types=1);

require_once __DIR__ . '/src/Other/functions.php';

require_once __DIR__ . '/src/Entities/Player.php';
require_once __DIR__ . '/src/Entities/Monster.php';
require_once __DIR__ . '/src/Entities/Trap.php';

require_once __DIR__ . '/src/Items/Weapon.php';
require_once __DIR__ . '/src/Other/Point.php';

// initialize player

while (empty($playerName)) {
    echo PHP_EOL;
    $playerName = trim(readline("Как зовут вашего персонажа? "));
}

$player = new Player(
    name: $playerName,
    position: new Point(0, 0),
    health: 100,
    innateDamage: 1,
    weapon: new Weapon(name: 'Меч', damage: 15)
);

// initialize world
$objectsOnMap = [
    new Monster(
        name: 'Орк',
        position: new Point(7, 7),
        health: 60,
        innateDamage: 10,
        weapon: new Weapon(name: 'Дубинка', damage: 10)
    ),
    new Monster(
        name: 'Разъяренная гончая',
        position: new Point(5, 0),
        health: 35,
        innateDamage: 7,
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
        health: 35,
        innateDamage: 7,
    ),
    new Monster(
        name: 'Слизняк',
        position: new Point(3, 3),
        health: 20,
        innateDamage: 5,
    ),
    new Monster(
        name: 'Орк',
        position: new Point(6, 6),
        health: 60,
        innateDamage: 10,
        weapon: new Weapon(name: 'Дубинка', damage: 10)
    ),
    new Monster(
        name: 'Разъяренная гончая',
        position: new Point(5, 4),
        health: 35,
        innateDamage: 7,
    ),
    new Monster(
        name: 'Гадкий гоблин',
        position: new Point(4, 5),
        health: 25,
        innateDamage: 1,
        weapon: new Weapon(name: 'Кинжал', damage: 2)
    ),
    new Monster(
        name: 'Разъяренная гончая',
        position: new Point(8, 5),
        health: 35,
        innateDamage: 7,
    ),
    new Monster(
        name: 'Слизняк',
        position: new Point(1, 1),
        health: 20,
        innateDamage: 5,
    ),
    new Monster(
        name: 'Орк',
        position: new Point(9, 6),
        health: 60,
        innateDamage: 10,
        weapon: new Weapon(name: 'Дубинка', damage: 10)
    ),
    new Monster(
        name: 'Орк',
        position: new Point(6, 10),
        health: 60,
        innateDamage: 10,
        weapon: new Weapon(name: 'Дубинка', damage: 10)
    ),
    new Monster(
        name: 'Орк',
        position: new Point(5, 3),
        health: 60,
        innateDamage: 10,
        weapon: new Weapon(name: 'Дубинка', damage: 10)
    ),
];

$exitPoint = new Point(
    x: random_int(8, 10),
    y: random_int(8, 10),
);

$isPlayerReachedExitPoint = false;
$countOfIterations = 0;

// start the game
while (!$isPlayerReachedExitPoint) {

    $distanceToExit = $player->getPosition()->calculateManhattanDistance($exitPoint);

    if ($distanceToExit === 0) {
        echoWithPseudoloading(
            '------------------' . PHP_EOL .
            '------------------' . PHP_EOL .
            'Поздравляем, вы дошли до выхода и выжили!' . PHP_EOL .
            '------------------' . PHP_EOL .
            "Это заняло $countOfIterations шагов!" . PHP_EOL .
            '------------------' . PHP_EOL .
            '------------------' . PHP_EOL,
            50000
        );
        exit();
    }

    foreach ($objectsOnMap as $objectOnMap) {
        $isPlayerFoundObjectOnMap = false;

        if ($player->getPosition()->getXY() == $objectOnMap->getPosition()->getXY()) {
            $isPlayerFoundObjectOnMap = true;
        } else {
            continue;
        }

        if ($objectOnMap instanceof Monster) {
            echoWithPseudoloading(
                PHP_EOL .
                '------------------' . PHP_EOL .
                'Вы наткнулись на монстра!' . PHP_EOL .
                '------------------' . PHP_EOL
            );

            $battle = true;

            while ($battle) {
                echoWithPseudoloading(sprintf(
                    PHP_EOL .
                    '------------------' . PHP_EOL .
                    'Статус монстра "%s":' . PHP_EOL .
                    'Здоровье: %d,' . PHP_EOL .
                    'Урон: %d' . PHP_EOL .
                    '------------------' . PHP_EOL,
                    $objectOnMap->getName(),
                    $objectOnMap->getHealth(),
                    $objectOnMap->getAttackDamage()
                ));

                echoWithPseudoloading(sprintf(
                    PHP_EOL .
                    '------------------' . PHP_EOL .
                    'Статус игрока "%s":' . PHP_EOL .
                    'Здоровье: %d,' . PHP_EOL .
                    'Ваш урон: %d' . PHP_EOL .
                    '------------------' . PHP_EOL,
                    $player->getName(),
                    $player->getHealth(),
                    $player->getAttackDamage()
                ));

                // player attacks
                echoWithPseudoloading('Нажмите Enter, чтобы ударить! ');
                $playerKey = readline();

                // moster take damage
                $objectOnMap->takeDamage($player->getAttackDamage());

                // if obj dead break
                if ($objectOnMap->isDead()) {
                    echoWithPseudoloading(PHP_EOL . 'Вы сразили монстра!' . PHP_EOL);
                    break 2;
                }

                // if obj not dead
                echoWithPseudoloading(
                    PHP_EOL . "О нет, у вас не хватило урона!, он бьет в ответ!" . PHP_EOL
                );

                $player->takeDamage($objectOnMap->getAttackDamage());

                if ($player->isDead()) {
                    Player::gameOver();
                }
            }
        }
    }

    $playerStatus = sprintf(
        PHP_EOL .
        '------------------' . PHP_EOL .
        'Статус игрока "%s":' . PHP_EOL .
        'Здоровье: %d,' . PHP_EOL .
        'Текущее оружие: %s, %d урона' . PHP_EOL .
        'Ваше местоположение: %d, %d' . PHP_EOL .
        'До выхода осталось: %d клеток' . PHP_EOL .
        '------------------' . PHP_EOL .
        PHP_EOL,
        $player->getName(),
        $player->getHealth(),
        $player->getWeapon()->getName(),
        $player->getWeapon()->getDamage(),
        $player->getPosition()->getX(),
        $player->getPosition()->getY(),
        $distanceToExit
    );

    echoWithPseudoloading($playerStatus);

    // !!! NEED TO REPLACE IN MoveController
    $nextStepIsValid = false;

    while (!$nextStepIsValid) {

        echoWithPseudoloading("Куда пойдем? w(0, +1), a(-1, 0), s(0, -1), d(+1, 0): ");
        $nextStepInput = trim(
            strtolower(
                readline()
            )
        );

        switch ($nextStepInput) {
            case 'w':
                $nextStepValue = ["x" => "0", "y" => "+1"];
                break;

            case 'a':
                $nextStepValue = ["x" => "-1", "y" => "0"];
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
                echoWithPseudoloading(
                    PHP_EOL . "Введите корректное значение!" . PHP_EOL
                );
                continue 2;
        }

        $playerPositionXY = $player->getPosition()->getXY();

        $playerGoesOnCoordinates = [
            "x" => $nextStepValue['x'] + $player->getPosition()->getX(),
            "y" => $nextStepValue['y'] + $player->getPosition()->getY()
        ];

        if (Point::isOutOfMap($playerGoesOnCoordinates)) {
            echoWithPseudoloading(
                PHP_EOL . "Ты ударился в стену!" . PHP_EOL
            );
            continue;
        }

        $player->getPosition()->moveTo(new Point(
            $playerGoesOnCoordinates['x'],
            $playerGoesOnCoordinates['y']
        ));

        $nextStepIsValid = true;
    }

    $countOfIterations++;
}
