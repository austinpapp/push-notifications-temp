@follow
Feature: List of following and followers requests
  Background: mobile users
    Given A mobile user with username "test1" and password "test1"
    And A mobile user with username "test2" and password "test2"

  Scenario: empty list
    Given Logged in as mobile user "test2"
    When call GET "/api/follow/"
    Then response status should be "200"
    And json response should be:
    """
      []
    """

  Scenario: post request and list
    Given Logged in as mobile user "test1"
    When call POST "/api/follow/" with data:
    """
      { "user": { "id": 2} }
    """
    Then response status should be "201"
    And json response should be:
    """
      {
        "id":1,
        "date_create":"*",
        "user":{
          "full_name":"test2 test2",
          "id":2,"username":"test2",
          "first_name":"test2",
          "last_name":"test2",
          "avatar_file_name":"*",
          "country":"US"
        },
        "follower":{
          "full_name":"test1 test1",
          "id":1,
          "username":"test1",
          "first_name":"test1",
          "last_name":"test1",
          "avatar_file_name":"*",
          "country":"US"
        },
        "status":0
      }
    """
    And Logged in as mobile user "test2"
    And call GET "/api/follow/"
    And json response should be:
    """
      [
        {
          "id":1,
          "date_create":"*",
          "user":"*",
          "follower":"*",
          "status":0
        }
      ]
    """

  Scenario: post request for existing follow
    Given Logged in as mobile user "test1"
    When call POST "/api/follow/" with data:
    """
      { "user": { "id": 2} }
    """
    And call POST "/api/follow/" with data:
    """
      { "user": { "id": 2} }
    """
    And call GET "/api/follow/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id":1,
          "date_create":"*",
          "user":"*",
          "follower":"*",
          "status":0
        }
      ]
    """