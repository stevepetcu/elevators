<?php declare(strict_types=1);

use Behat\Behat\Context\Context;
use Elevators\Elevator;
use PHPUnit\Framework\Assert;

/**
 * Defines the steps for the different Scenarios present in our Elevator feature context.
 * Every Scenario gets its own context instance.
 */
class ElevatorContext implements Context
{
    /** @var  Elevator */
    private $elevator;

    public function __construct()
    {
        $this->elevator = new Elevator();
    }

    /**
     * @When I select floor number :number
     */
    public function iSelectFloorNumber(int $number) {
        $this->elevator->queueFloor($number);
    }

    /**
     * @Given The elevator's itinerary is :floors
     */
    public function elevatorItineraryIs(string $floors) {
        $floors = explode(',', $floors);

        foreach ($floors as $floor) {
            $this->elevator->queueFloor((int)$floor);
        }
    }

    /**
     * @Given Floor number :number is not already queued
     */
    public function floorNumberIsNotAlreadyQueued(int $number) {
        Assert::assertArrayNotHasKey($number, $this->elevator->getFloorsQueue());
    }

    /**
     * @Then The elevator should queue floor number :number
     */
    public function elevatorShouldQueueFloorNumber(int $number) {
        Assert::assertTrue($this->elevator->getFloorsQueue()[$number]);
    }

    /**
     * @Then The elevator's itinerary should be :floors
     */
    public function elevatorItineraryShouldBe(string $floors) {
        $floors = explode(',', $floors);

        foreach ($floors as $floor) {
            Assert::assertTrue($this->elevator->getFloorsQueue()[$floor]);
        }
    }

    /**
     * @When The elevator has reached floor number :number
     */
    public function elevatorHasReachedFloorNumber(int $number) {
        $this->elevator->dequeueFloor($number);
    }
}
