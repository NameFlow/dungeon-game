<?php

declare(strict_types=1);

require_once __DIR__ . '/../Items/Weapon.php';

trait CanEquipWeapon
{
    private ?Weapon $equippedWeapon;

    public function equipWeapon(Weapon $weapon): void
    {
        $this->equippedWeapon = $weapon;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->equippedWeapon;
    }
}
