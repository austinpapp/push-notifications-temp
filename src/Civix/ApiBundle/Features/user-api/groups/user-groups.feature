@groups
Feature: List of user groups with status

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"

  Scenario: user should be logged in
    When call GET "/api/groups/user-groups/"
    Then response status should be "401"

  Scenario: list
    Given Logged in as mobile user "test"
    When call GET "/api/groups/user-groups/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id": "*",
          "status": 1,
          "group": {
            "id":1,
            "username":"US",
            "group_type":1,
            "avatar_file_path":"*",
            "official_title":"The United States of America",
            "acronym":"US",
            "joined":1,
            "membership_control":0,
            "fill_fields_required":false,
            "petition_per_month":5
          }
        },
        {
          "id": "*",
          "status": 1,
          "group": {
            "id":31,
            "username":"*",
            "group_type":2,
            "avatar_file_path":"*",
            "official_title":"New Jersey",
            "acronym":"NJ",
            "joined":1,
            "membership_control":0,
            "fill_fields_required":false,
            "petition_per_month":5
          }
        }
      ]
    """
