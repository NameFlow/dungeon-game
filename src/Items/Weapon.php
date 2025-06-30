<?php

declare(strict_types=1);

class Weapon
{
    private string $name;

    private int $damage;

    public function __construct(string $name, int $damage)
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException('Свойство name не может быть пустым');
        } elseif ($damage <= 0) {
            throw new InvalidArgumentException('Свойство damage может быть меньше или равен 0');
        }

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
