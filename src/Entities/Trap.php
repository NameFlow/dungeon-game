<?php

declare(strict_types=1);

require_once __DIR__ . '/MapEntity.php';

require_once __DIR__ . '/../Contracts/AttackerLogicInterface.php';

require_once __DIR__ . '/../Abilities/AttackerLogic.php';

class Trap extends MapEntity implements AttackerLogicInterface
{
    use AttackerLogic;

    public function __construct(
        string $name,
        Point $position,
        int $innateDamage,
    ) {
        parent::__construct($name, $position);

        $this->initializeInnateDamage($innateDamage);
    }
}
