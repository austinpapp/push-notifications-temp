Feature: Group login
  Scenario: Login to group panel
    Given I am on "/group/login"
     When I fill in "_username" with "testgroup"
      And I fill in "_password" with "testgroup7ZAPe3QnZhbdec"
      And I press "login"
     Then the response status code should be 200
      And I should be on homepage

  Scenario: Incorrect login to group panel
    Given I am on "/group/login"
     When I fill in "_username" with "testgroup"
      And I fill in "_password" with "wrong password"
      And I press "login"
     Then the response status code should be 200
      And the url should match "/login"

  Scenario: As group I go to group panel
    Given I am logged in as Group
      And I go to "/group/edit-profile"
     Then the response status code should be 200
      And the url should match "/group/edit-profile"
