<?php

declare(strict_types=1);

interface CanEquipWeaponInterface
{
    public function equipWeapon(Weapon $weapon): void;
    public function getWeapon(): ?Weapon;
}
