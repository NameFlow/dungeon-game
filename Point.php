<?php

declare(strict_types=1);

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        if ($x < 0 || $x > 10 && $y < 0 || $y > 10) {
            throw new InvalidArgumentException('Minimum and maximum range is 0, 10');
        }

        $this->x = $x;
        $this->y = $y;
    }

    public static function calculateManhattanDistance(Point $p1, Point $p2): int
    {
        return (abs($p2->getX() - $p1->getX()) + abs($p2->getY() - $p1->getY()));
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function isEqualTo(Point $other): bool
    {
        if ($other->getX() === $this->x && $other->getY() === $this->y) {
            return true;
        }
        return false;
    }
}
