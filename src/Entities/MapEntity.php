<?php

declare(strict_types=1);

require_once __DIR__ . '/../Other/Point.php';

abstract class MapEntity
{
    protected string $name;
    protected Point $position;

    public function __construct(string $name, Point $position)
    {
        if (empty(trim($name))) {
            throw new InvalidArgumentException('Свойство name не может быть пустой строкой');
        }
        $this->name = $name;
        $this->position = $position;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): Point
    {
        return $this->position;
    }
}
