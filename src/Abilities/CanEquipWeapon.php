<?php

declare(strict_types=1);

require_once('../Items/Weapon.php');

trait CanEquipWeapon
{
    private ?Weapon $equippedWeapon;

    public function equipWeapon(Weapon $weapon): void
    {
        $this->equippedWeapon = $weapon;
    }
}
