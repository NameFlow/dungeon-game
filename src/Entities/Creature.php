<?php

declare(strict_types=1);

require_once __DIR__ . '../World/Point.php';

abstract class Creature
{
    protected string $name;
    protected Point $position;
}
