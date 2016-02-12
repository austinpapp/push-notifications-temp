Feature: Manage announcements
    Scenario: As group I can see the list of announcements
        Given I am logged in as Group
          And I go to "/group/announcements"
         Then the response status code should be 200
          And the url should match "/group/announcements"

    Scenario: As group I can see a form for creation announcements
        Given I am logged in as Group
          And I go to "/group/announcements/new"
         Then the response status code should be 200
          And the url should match "/group/announcements/new"