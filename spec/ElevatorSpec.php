<?php declare(strict_types=1);

namespace spec\Elevators;

use Elevators\Elevator;
use PhpSpec\ObjectBehavior;

/**
 * Describes the behaviour of an Elevator.
 */
class ElevatorSpec extends ObjectBehavior
{
    public function it_is_instantiable()
    {
        $this->shouldHaveType(Elevator::class);
    }

    public function it_can_queue_a_floor_and_get_the_queue()
    {
        $this->getFloorsQueue()->shouldReturn([]);
        $this->queueFloor(3);
        $this->getFloorsQueue()->shouldReturn([3 => true]);
    }

    public function it_does_not_alter_queue_when_reselecting_floor()
    {
        $this->queueFloor(3);
        $this->queueFloor(1);
        $this->getFloorsQueue()->shouldReturn([3 => true, 1 => true]);

        $this->queueFloor(3);
        $this->getFloorsQueue()->shouldReturn([3 => true, 1 => true]);
    }

    public function it_can_remove_a_floor_from_the_queue()
    {
        $this->queueFloor(3);
        $this->dequeueFloor(3);

        $this->getFloorsQueue()->shouldReturn([]);
    }
}
