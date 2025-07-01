<?php

declare(strict_types=1);

interface AttackerLogicInterface
{
    public function initializeInnateDamage(int $innateDamage): void;

    public function getAttackDamage(): int;
}
