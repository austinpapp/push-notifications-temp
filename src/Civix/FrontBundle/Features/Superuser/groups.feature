Feature: Different types of groups
    Scenario: As admin I can to see list of state groups
        Given I am logged in as Administrator
          And I go to "superuser/group/state"
         Then the response status code should be 200
          And the url should match "superuser/group/state"
          And I should see "Select the country group"

    Scenario: As admin I can to see list of local groups
        Given I am logged in as Administrator
          And I go to "/superuser/group/local"
         Then the response status code should be 200
          And the url should match "superuser/group/local"
