<?php declare(strict_types=1);

namespace Elevators;

class Elevator
{
    private $floorsQueue = [];

    public function getFloorsQueue(): array
    {
        return $this->floorsQueue;
    }

    public function queueFloor(int $floor): self
    {
        if (!isset($this->floorsQueue[$floor])) {
            $this->floorsQueue[$floor] = true;
        }

        return $this;
    }

    public function dequeueFloor(int $floor): self
    {
        unset($this->floorsQueue[$floor]);

        return $this;
    }
}
