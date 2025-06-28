<?php


declare(strict_types=1);

class Weapon
{
    private string $name;
    private int $damage;

    public function __construct(string $name, int $damage)
    {
        $this->name = $name;
        if ($damage > 0) {
            $this->damage = $damage;
        } else {
            throw new InvalidArgumentException("Weapon damage cannot be less then 0");
        }
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
