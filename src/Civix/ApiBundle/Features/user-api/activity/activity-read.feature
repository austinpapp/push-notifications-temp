@activities @activities-read
Feature: sync read activities

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"

  Scenario: Sending the activities which read
    Given Logged in as mobile user "test"
    When call POST "/api/activities/read/" with data:
    """
     [
        {
          "activity_id": 2
        },
        {
          "activity_id": 3
        }
     ]
    """
    Then response status should be "201"