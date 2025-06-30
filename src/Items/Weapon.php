<?php

declare(strict_types=1);

class Weapon
{
    private string $name;

    private int $damage;

    public function __construct(string $name, int $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }
}
