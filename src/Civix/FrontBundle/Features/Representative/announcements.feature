Feature: Manage announcements
    Scenario: As representative I can see the list of announcements
        Given I am logged in as Representative
          And I go to "/representative/announcements"
         Then the response status code should be 200
          And the url should match "/representative/announcements"

    Scenario: As representative I can see a form for creation announcements
        Given I am logged in as Representative
          And I go to "/representative/announcements/new"
         Then the response status code should be 200
          And the url should match "/representative/announcements/new"