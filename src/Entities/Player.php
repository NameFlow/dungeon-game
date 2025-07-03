<?php

declare(strict_types=1);

require_once __DIR__ . '/../Other/functions.php';

require_once __DIR__ . '/MapEntity.php';

require_once __DIR__ . '/../Contracts/AttackerLogicInterface.php';
require_once __DIR__ . '/../Contracts/CanEquipWeaponInterface.php';
require_once __DIR__ . '/../Contracts/DamageableInterface.php';

require_once __DIR__ . '/../Abilities/AttackerLogic.php';
require_once __DIR__ . '/../Abilities/CanEquipWeapon.php';
require_once __DIR__ . '/../Abilities/Damageable.php';

class Player extends MapEntity implements AttackerLogicInterface, CanEquipWeaponInterface, DamageableInterface
{
    use AttackerLogic;
    use CanEquipWeapon;
    use Damageable;


    public function __construct(
        string $name,
        Point $position,
        int $health,
        int $innateDamage,
        ?Weapon $weapon = null
    ) {
        parent::__construct($name, $position);

        $this->initializeHealth($health);
        $this->initializeInnateDamage($innateDamage);

        $this->equippedWeapon = $weapon;
    }

    public static function gameOver(): void
    {
        echoWithPseudoloading(
            PHP_EOL .
            '------------------' . PHP_EOL .
            "    ВЫ ПОГИБЛИ" . PHP_EOL .
            '------------------' . PHP_EOL,
            50000
        );

        exit();
    }
}
