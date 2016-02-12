Feature: Manage petitions
    Scenario: As group I can see the list of petitions
        Given I am logged in as Group
          And I go to "/group/petitions"
         Then the response status code should be 200
          And the url should match "/group/petitions"

    Scenario: As group I can see a form for creation petition
        Given I am logged in as Group
          And I go to "/group/petitions/new"
         Then the response status code should be 200
          And the url should match "/group/petitions/new"