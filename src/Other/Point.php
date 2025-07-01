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

    public function calculateManhattanDistance(Point $pointTo): int
    {
        return abs(($pointTo->x - $this->x) + ($pointTo->y - $this->y));
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}
