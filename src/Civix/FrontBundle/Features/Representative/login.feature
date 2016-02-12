Feature: Representative login
  Scenario: Login to representative panel
    Given I am on "/representative/login"
     When I fill in "_username" with "testrepresentative"
      And I fill in "_password" with "testrepresentative7ZAPe3QnZhbdec"
      And I press "login"
     Then the response status code should be 200
      And I should be on homepage

  Scenario: Incorrect login to representative panel
    Given I am on "/representative/login"
     When I fill in "_username" with "testrepresentative"
      And I fill in "_password" with "wrong password"
      And I press "login"
     Then the response status code should be 200
      And the url should match "/login"

  Scenario: As representative I go to representative panel
    Given I am logged in as Representative
      And I go to "/representative/edit-profile"
     Then the response status code should be 200
      And the url should match "/representative/edit-profile"

