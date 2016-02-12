@activities @social-activities
Feature: Mention social activities

  Background: Mobile user
    Given A mobile user with username "tom" and password "password"
    And A mobile user with username "alice" and password "password"

  Scenario: User sees mention activity from group member
    Given "alice" create a post "Elections" in "US" community
    When "alice" comment to post "Elections" with message "@tom I need your opinion"
    Then "tom" sees mentioned social activity item on "you" tab from "alice"

  Scenario: User sees mention activity form following
    Given "tom" follow "alice"
    And A group with username "powerline" and password "password"
    And user "alice" joined to group "powerline"
    When "alice" create a post "Elections" in "powerline" community
    And "alice" comment to post "Elections" with message "@tom I need your opinion"
    Then "tom" sees mentioned social activity item on "you" tab from "alice"
