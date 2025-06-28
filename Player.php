<?php

declare(strict_types=1);

class Player
{
    private string $name;

    private int $health;

    private ?Weapon $weapon;

    private Point $point;

    public function __construct(string $name, int $health, Point $point)
    {
        if ($health <= 0) {
            throw new InvalidArgumentException('Health cannot be less or equals 0');
        }

        $this->name = $name;
        $this->health = $health;
        $this->point = $point;
    }

    public function takeDamage(int $damage)
    {
        if ($damage > 0) {
            $this->name -= $damage;
        }
    }

    public function equipWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;
    }

    public function isDead(): bool
    {
        if ($this->health <= 0) {
            return true;
        }
        return false;
    }

    public function moveTo(Point $newPoint)
    {
        $this->point = $newPoint;
    }

    public function getAttackDamage(): int
    {
        if (empty($this->weapon)) {
            return 1;
        }

        return $this->weapon->getDamage();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getPoint(): Point
    {
        return $this->point;
    }
}
