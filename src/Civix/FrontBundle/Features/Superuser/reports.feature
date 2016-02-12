Feature: View reports
    Scenario: As admin I can to see reports
        Given I am logged in as Administrator
          And I go to "/superuser/reports"
         Then the response status code should be 200
          And the url should match "/superuser/reports"