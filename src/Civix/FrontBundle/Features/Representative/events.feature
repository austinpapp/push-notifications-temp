Feature: Manage leader events
    Scenario: As representative I can see the list of events
        Given I am logged in as Representative
          And I go to "/representative/leader-event"
         Then the response status code should be 200
          And the url should match "/representative/leader-event"

    Scenario: As representative I can see form for creation a new event
        Given I am logged in as Representative
          And I go to "/representative/leader-event/new"
         Then the response status code should be 200
          And the url should match "/representative/leader-event/new"