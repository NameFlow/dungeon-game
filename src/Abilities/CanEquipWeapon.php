<?php

declare(strict_types=1);

require_once('../Items/Weapon.php');

trait CanEquipWeapon
{
    private ?Weapon $equippedWeapon = null;

    public function equipWeapon(Weapon $weapon)
    {
        $this->equippedWeapon = $weapon;
    }
}
