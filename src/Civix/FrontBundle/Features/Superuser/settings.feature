Feature: View settings
    Scenario: As admin I can to see reports
        Given I am logged in as Administrator
          And I go to "/superuser/settings/states"
         Then the response status code should be 200
          And the url should match "/superuser/settings/states"
          And I should see "Representatives for update"