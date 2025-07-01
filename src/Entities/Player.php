<?php

declare(strict_types=1);

require_once __DIR__ . '/Creature.php';

require_once __DIR__ . '/../Contracts/AttackerLogicInterface.php';
require_once __DIR__ . '/../Contracts/DamageableInterface.php';

require_once __DIR__ . '/../Abilities/AttackerLogic.php';
require_once __DIR__ . '/../Abilities/Damageable.php';

class Player extends Creature implements AttackerLogicInterface, DamageableInterface
{
    use AttackerLogic;
    use Damageable;

    public function __construct(
        string $name,
        Point $position,
        int $health,
        int $innateDamage,
        ?Weapon $weapon
    ) {
        parent::__construct($name, $position);
        $this->initializeInnateDamage($innateDamage);
        $this->initializeHealth($health);

        $this->equippedWeapon = $weapon;
    }
}
