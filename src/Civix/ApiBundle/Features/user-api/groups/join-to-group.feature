@groups @join-to-group
Feature: Join users to groups

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"
    And There are "TEST GROUP" community in the system
    And Logged in as mobile user "test"

  Scenario: Joining approval
    Given The membership control for "TEST GROUP" community is "1"
    When call POST "/api/groups/join/53" with data:
    """
    """
    Then response status should be "200"
    And json response should be:
    """
      {"status": 0}
    """
    Then "TEST GROUP" community approve the request from user "test"
    Then call GET "/api/social-activities/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id": 1,
          "created_at": "*",
          "group": {
            "id": 53,
            "type": "group",
            "group_type": 0,
            "avatar_file_path": "*",
            "official_title": "TEST GROUP"
          },
          "type": "joinToGroup-approved",
          "target": {
            "id": 53,
            "type": "group"
          },
          "tab": "you",
          "html_message": "<p>Request to join <strong>TEST GROUP</strong> has been approved</p>"
        }
      ]
    """