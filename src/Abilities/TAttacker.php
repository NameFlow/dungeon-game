<?php

declare(strict_types=1);

require_once __DIR__ . '/../Items/Weapon.php';

/**
 * Трейт для атакующих сущностей
 *
 * !!! ОБЯЗАТЕЛЬНО ИСПОЛЬЗОВАТЬ ВАЛИДАЦИЮ validateInnateDamage()
 */
trait TAttacker
{
    private ?Weapon $equippedWeapon;

    private int $innateDamage;

    /**
     * @throws InvalidArgumentException если innateDamage меньше или равен нулю
     */
    public function validateInnateDamage(): void
    {
        if ($this->innateDamage <= 0) {
            throw new InvalidArgumentException('innateDamage не может быть меньше или равен нулю');
        }
    }

    public function getAttackDamage(): int
    {
        if (isset($this->equippedWeapon)) {
            return $this->equippedWeapon->getDamage() + $this->innateDamage;
        }
        return $this->innateDamage;
    }
}
