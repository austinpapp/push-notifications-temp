Feature: Manage petitions
    Scenario: As representative I can see the list of petitions
        Given I am logged in as Representative
          And I go to "/representative/petitions"
         Then the response status code should be 200
          And the url should match "/representative/petitions"

    Scenario: As representative I can see a form for creation petition
        Given I am logged in as Representative
          And I go to "/representative/petitions/new"
         Then the response status code should be 200
          And the url should match "/representative/petitions/new"