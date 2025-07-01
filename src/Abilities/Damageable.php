<?php

declare(strict_types=1);

/**
 * Трейт для получающих урон сущностей
 *
 * !!! ОБЯЗАТЕЛЬНО ИСПОЛЬЗОВАТЬ ИНИЦИАЛИЗАЦИЮ initializeHealth() в __construct
 */
trait Damageable
{
    private int $health;

    /**
     * @throws InvalidArgumentException если health меньше или равен нулю
     */
    public function initializeHealth(int $health): void
    {
        if ($health <= 0) {
            throw new InvalidArgumentException('health не может быть меньше или равен нулю');
        }
        $this->health = $health;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = $this->health - $damage;
    }

    public function isDead(): bool
    {
        if ($this->health <= 0) {
            return true;
        }
        return false;
    }

    public function getHealth(): int
    {
        return $this->health;
    }
}
