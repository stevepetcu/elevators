<?php declare(strict_types=1);

namespace Elevators;

class Elevator
{
    /** @var array $floorsQueue */
    private $floorsQueue = [];

    /**
     * @return array
     */
    public function getFloorsQueue(): array
    {
        return $this->floorsQueue;
    }

    /**
     * @param int $floor
     *
     * @return self
     */
    public function queueFloor(int $floor): self
    {
        if (!isset($this->floorsQueue[$floor])) {
            $this->floorsQueue[$floor] = true;
        }

        return $this;
    }
}
