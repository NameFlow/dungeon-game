<?php

declare(strict_types=1);

require_once __DIR__ . '/../Items/Weapon.php';

/**
 * Трейт для атакующих сущностей
 *
 * !!! ОБЯЗАТЕЛЬНО ИСПОЛЬЗОВАТЬ ИНИЦИАЛИЗАЦИЮ initializeInnateDamage() в __construct
 */
trait AttackerLogic
{
    private int $innateDamage;

    /**
     * @throws InvalidArgumentException если innateDamage меньше или равен нулю
     */
    public function initializeInnateDamage(int $innateDamage): void
    {
        if ($innateDamage <= 0) {
            throw new InvalidArgumentException('innateDamage не может быть меньше или равен нулю');
        }
        $this->innateDamage = $innateDamage;
    }

    /**
     * Получает Итоговый урон от атаки
     *
     * Может взаимодействовать с трейтом CanEquipWeapon
     *
     * @return int Возвращает изначальный урон + урон от оружия, если оружие имеется, иначе возвращает innateDamage
     */

    public function getAttackDamage(): int
    {
        if (isset($this->equippedWeapon)) {
            return $this->equippedWeapon->getDamage() + $this->innateDamage;
        }
        return $this->innateDamage;
    }
}
