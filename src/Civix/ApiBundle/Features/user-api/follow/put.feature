@follow
Feature: Approve / Reject / Unfollow
  Background: mobile users and follow
    Given A mobile user with username "test1" and password "test1"
    And A mobile user with username "test2" and password "test2"
    And Logged in as mobile user "test1"
    And call POST "/api/follow/" with data:
    """
      { "user": { "id": 2} }
    """
    And response status should be "201"

  Scenario: approve secure
    Given Logged in as mobile user "test1"
    When call PUT "/api/follow/1" with data:
    """
      { "status": 1 }
    """
    Then response status should be "403"

  Scenario: approve / unapprove
    Given Logged in as mobile user "test2"
    When call PUT "/api/follow/1" with data:
    """
      { "status": 1 }
    """
    Then response status should be "200"
    And json response should be:
      """
        {
          "id":1,
          "date_create":"*",
          "date_approval":"*",
          "user":"*",
          "follower":"*",
          "status":1
        }
      """
    And call PUT "/api/follow/1" with data:
      """
        { "status": 0 }
      """
    And json response should be:
      """
        {
          "id":1,
          "date_create":"*",
          "date_approval":"*",
          "user":"*",
          "follower":"*",
          "status":0
        }
      """

  Scenario: unfollow
    Given Logged in as mobile user "test1"
    And call DELETE "/api/follow/1"
    Then response status should be "204"
    And Logged in as mobile user "test2"
    And call GET "/api/follow/"
    And json response should be:
    """
      []
    """

  Scenario: follow request social activity
    Given Logged in as mobile user "test2"
    When call GET "/api/social-activities/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id": 1,
          "created_at": "*",
          "following": {
            "id": "*",
            "type": "user",
            "full_name": "test1 test1",
            "avatar_file_name": "*",
            "official_title": "test1 test1"
          },
          "type": "follow-request",
          "target": {
            "id": 1,
            "type": "user"
          },
          "tab": "you",
          "html_message": "<p><strong>test1 test1</strong> wants to follow you</p>"
        }
      ]
    """
