<?php

declare(strict_types=1);

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        if (($x < 0 || $x > 10) || ($y < 0 || $y > 10)) {
            throw new InvalidArgumentException('Значение x или y не может быть меньше 0 или больше 10.');
        }
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateManhattanDistance(int $x2, int $y2): int
    {
        return abs(($x2 - $this->x) + ($y2 - $this->y));
    }
}
