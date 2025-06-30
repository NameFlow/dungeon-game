<?php

declare(strict_types=1);

trait TDamageable
{
    private int $health;

    /**
     * @throws InvalidArgumentException если initializeHealth меньше или равен нулю
     */
    public function initializeHealth(int $health): void
    {
        if ($health <= 0) {
            throw new InvalidArgumentException('initializeHealth не может быть меньше или равен нулю');
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
