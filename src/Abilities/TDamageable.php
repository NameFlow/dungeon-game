<?php

declare(strict_types=1);

trait TDamageable
{
    public int $health;

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
