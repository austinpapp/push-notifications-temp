Feature: Manage users by superuser
    Scenario: As admin I can to see list of representatives
        Given I am logged in as Administrator
          And I go to "/superuser/manage/representatives"
         Then the response status code should be 200
          And the url should match "/superuser/manage/representatives"
          And I should see "Joseph Biden"

    Scenario: As admin I can to see list of groups
        Given I am logged in as Administrator
          And I go to "/superuser/manage/groups"
         Then the response status code should be 200
          And the url should match "/superuser/manage/groups"
          And I should see "testgroup@example.com"

    Scenario: As admin I can to see list of users
        Given I am logged in as Administrator
          And I go to "/superuser/manage/users"
         Then the response status code should be 200
          And the url should match "/superuser/manage/users"
          And I should see "mobile1@example.com"
          And I should see "mobile2@example.com"


    Scenario: As admin I can to see list of limits
        Given I am logged in as Administrator
          And I go to "/superuser/manage/limits"
         Then the response status code should be 200
          And the url should match "/superuser/manage/limits"
