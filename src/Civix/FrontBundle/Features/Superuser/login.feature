Feature: Superuser login
  Scenario: Login to admin
    Given I am on "/superuser/login"
     When I fill in "_username" with "admin"
      And I fill in "_password" with "admin"
      And I press "login"
     Then the response status code should be 200
      And I should be on homepage

  Scenario: Incorrect login to admin
    Given I am on "/superuser/login"
     When I fill in "_username" with "admin"
      And I fill in "_password" with "wrong password"
      And I press "login"
     Then the response status code should be 200
      And the url should match "/login"

  Scenario: As admin I go to admin dashboard
    Given I am logged in as Administrator
      And I go to "/superuser/approvals"
     Then the response status code should be 200
      And the url should match "/superuser/approvals"