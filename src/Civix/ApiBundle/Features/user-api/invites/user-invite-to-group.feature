@invites
Feature: User should be able to create invites to group
  Background: Mobile users and initial micropetitions
    Given A mobile user with username "test1" and password "test1"
    And A mobile user with username "test2" and password "test2"
    And A group with username "test_group" and password "test_group"
    And A group with username "test_group_unjoined" and password "test_group_unjoined"
    And user "test1" joined to group "test_group"

  Scenario: Empty list
    Given Logged in as mobile user "test2"
    When call GET "/api/invites/"
    Then response status should be "200"
    And json response should be:
    """
      []
    """

  Scenario: Invite to group
    Given Logged in as mobile user "test1"
    When call POST "/api/invites/" with data:
    """
     [
        {
          "type": "user-to-group",
          "user": {"id": 2},
          "group": {"id": 53}
        }
     ]
    """
    Then response status should be "201"
    And json response should be:
    """
      [
        {
          "id": "*",
          "group": {
            "id": 53,
            "type": "group",
            "group_type": 0,
            "avatar_file_path":"*",
            "membership_control": 0,
            "fill_fields_required": false
          },
          "inviter": {
            "id": 1,
            "type": "user",
            "username": "test1",
            "first_name": "test1",
            "last_name": "test1",
            "avatar_file_name": "*"
          }
        }
      ]
    """

  Scenario: List of invites
    Given Logged in as mobile user "test1"
    And call POST "/api/invites/" with data:
    """
     [
        {
          "type": "user-to-group",
          "user": {"id": 2},
          "group": {"id": 53}
        }
     ]
    """
    And Logged in as mobile user "test2"
    When call GET "/api/invites/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id": "*",
          "group": {
            "id": 53,
            "type": "group",
            "group_type": 0,
            "avatar_file_path":"*",
            "membership_control": 0,
            "fill_fields_required": false
          },
          "inviter": {
            "id": 1,
            "type": "user",
            "username": "test1",
            "first_name": "test1",
            "last_name": "test1",
            "avatar_file_name": "*"
          }
        }
      ]
    """

  Scenario: Should not create invite to group if user already invited
    Given Logged in as mobile user "test1"
    And call POST "/api/invites/" with data:
    """
     [
        {
          "type": "user-to-group",
          "user": {"id": 2},
          "group": {"id": 53}
        }
     ]
    """
    When call POST "/api/invites/" with data:
    """
     [
        {
          "type": "user-to-group",
          "user": {"id": 2},
          "group": {"id": 53}
        }
     ]
    """
    Then response status should be "201"
    And json response should be:
    """
      []
    """

  Scenario: Should remove invite
    Given Logged in as mobile user "test1"
    And call POST "/api/invites/" with data:
    """
     [
        {
          "type": "user-to-group",
          "user": {"id": 2},
          "group": {"id": 53}
        }
     ]
    """
    And Logged in as mobile user "test2"
    When call DELETE "/api/invites/1"
    Then response status should be "204"
    And call GET "/api/invites/"
    And json response should be:
    """
      []
    """