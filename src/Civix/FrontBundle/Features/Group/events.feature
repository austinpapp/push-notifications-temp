Feature: Manage leader events
    Scenario: As group I can see the list of events
        Given I am logged in as Group
          And I go to "/group/leader-event"
         Then the response status code should be 200
          And the url should match "/group/leader-event"

    Scenario: As group I can see form for creation a new event
        Given I am logged in as Group
          And I go to "/group/leader-event/new"
         Then the response status code should be 200
          And the url should match "/group/leader-event/new"