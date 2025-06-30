<?php

declare(strict_types=1);

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateManhattanDistance(int $x2, int $y2): int
    {
        return abs(($x2 - $this->x) + ($y2 - $this->y));
    }
}
