Feature: Manage micropetitions
    Scenario: As group I can see the list of mictopetitions
        Given I am logged in as Group
          And I go to "/group/micro-petitions"
         Then the response status code should be 200
          And the url should match "/group/micro-petitions"

    Scenario: As group I can see form of configuration
        Given I am logged in as Group
          And I go to "/group/micro-petitions/config"
         Then the response status code should be 200
          And the url should match "/group/micro-petitions/config"

    Scenario: As group I can see list of open micropetitions
      Given I am logged in as Group
      And I go to "/group/micro-petitions/open"
      Then the response status code should be 200
      And the url should match "/group/micro-petitions/open"