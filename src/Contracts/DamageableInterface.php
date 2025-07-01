<?php

declare(strict_types=1);

interface DamageableInterface
{
    public function initializeHealth(int $health): void;

    public function takeDamage(int $damage): void;

    public function isDead(): bool;

    public function getHealth(): int;
}
