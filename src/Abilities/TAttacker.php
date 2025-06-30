<?php

declare(strict_types=1);

require_once __DIR__ . '../Items/Weapon.php';

trait TAttacker
{
    private ?Weapon $equippedWeapon;

    private int $innateDamage;

    public function __construct(int $innateDamage, ?Weapon $weapon)
    {
        if (isset($weapon)) {
            $this->equippedWeapon = $weapon;
        }

        $this->innateDamage = $innateDamage;
    }

    public function getAttackDamage(): int
    {
        if (isset($this->equippedWeapon)) {
            return $this->equippedWeapon->getDamage() + $this->innateDamage;
        }
        return $this->innateDamage;
    }
}
