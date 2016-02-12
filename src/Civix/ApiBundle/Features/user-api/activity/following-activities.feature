@activities @following-activities
Feature: list of activity items filtered by following

  Background: Mobile user
    Given A mobile user with username "tom" and password "password"
    And A mobile user with username "alice" and password "password"

  Scenario: User sees activities by following
    Given "tom" follow "alice"
    When "alice" create a post "Powerline can change the world" in "US" community
    Then "tom" sees "Powerline can change the world" activity on "alice" profile