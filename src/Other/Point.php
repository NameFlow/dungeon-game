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

    /**
     * Checking if a point is within range or not
     *
     * @param array $coordinates wait associative array with keys "x" and "y"
     * @return boolean false if not, true if is
     */
    public static function isOutOfMap(array $coordinates): bool
    {
        $x = $coordinates['x'];
        $y = $coordinates['y'];

        if (($x < 0 || $x > 10) || ($y < 0 || $y > 10)) {
            return true;
        }
        return false;
    }

    public function calculateManhattanDistance(Point $pointTo): int
    {
        return abs(($pointTo->x - $this->x) + ($pointTo->y - $this->y));
    }

    public function moveTo(Point $point): void
    {
        $this->x = $point->getX();
        $this->y = $point->getY();
    }

    public function setXY(int $x, int $y): void
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    /**
     * @return array
     */

    public function getXY(): array
    {
        return [
            "x" => $this->x,
            "y" => $this->y
        ];
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
