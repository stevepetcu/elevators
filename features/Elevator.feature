Feature: Elevator
  In order to travel between the floors of the building
  As a person
  I need to be able to take the elevator to any floor

  Scenario: Select a given floor to take the elevator to
    Given Floor number 3 is not already queued
    When I select floor number 3
    Then The elevator should queue floor number 3

  Scenario: Re-selecting a floor does not change elevator's itinerary
    Given The elevator's itinerary is 3,1
    When I select floor number 3
    Then The elevator's itinerary should be 3,1