Feature: Manage group members
    Scenario: As group I can see the list of group's members
        Given I am logged in as Group
          And I go to "/group/members"
         Then the response status code should be 200
          And the url should match "/group/members"

    Scenario: As group I can see form for sending invite
        Given I am logged in as Group
          And I go to "/group/invite"
         Then the response status code should be 200
          And the url should match "/group/invite"

    Scenario: As group I can see the list of section
        Given I am logged in as Group
          And I go to "/group/sections/"
         Then the response status code should be 200
          And the url should match "/group/subscriptions"

    Scenario: As group I can see form for creation section
        Given I am logged in as Group
          And I go to "/group/sections/new"
         Then the response status code should be 200
          And the url should match "/group/subscriptions"