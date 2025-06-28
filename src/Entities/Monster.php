<?php

declare(strict_types=1);

class Monster
{
    private string $name;

    private int $health;

    private int $damage;

    private Point $position;

    public function __construct(string $name, int $health, int $damage, Point $position)
    {
        if ($damage <= 0 || $health <= 0) {
            throw new InvalidArgumentException('Value $damage or $health cannot be less or equals 0');
        }
        $this->name = $name;
        $this->health = $health;
        $this->damage = $damage;
        $this->position = $position;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }


}
