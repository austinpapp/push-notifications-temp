@activity
Feature: list of closed activity items
  Background: Mobile user
    Given A mobile user with username "test" and password "test1"

  Scenario: open items should not be shown
    Given Logged in as mobile user "test"
    And There are published questions
      | subject   | type      | owner      | username |
      | test_US1  | Group     | Group      | US       |
      | test_NJ1  | Group     | Group      | NJ       |
    And There are activity for questions
      | question  |
      | test_US1  |
      | test_NJ1  |
    When call GET "/api/activity/?start=2014-01-01&closed=1"
    Then response status should be "200"
    And json response should be:
    """
      []
    """

  Scenario: closed items
    Given Logged in as mobile user "test"
    And There are published questions
      | subject         | type      | owner          | username |
      | test_US1        | Group     | Group          | US       |
      | test_superuser  | Superuser | Superuser      | admin       |
    And There are activity for questions
      | question        | expired_interval_direction  | expired_interval_value |
      | test_US1        | sub                         | P2D                    |
      | test_superuser  | sub                         | P5D                    |
    When call GET "/api/activity/?start=2014-01-01&closed=1"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id":"*",
          "title":"",
          "description":"test_superuser",
          "sent_at":"*",
          "expire_at":"*",
          "responses_count":0,
          "owner":
            {
              "type":"admin",
              "official_title":"The Global Forum",
              "avatar_file_path": "*"
            },
          "entity":
            {
              "type":"question",
              "id":"*"
            }
        },
                {
          "id":"*",
          "title":"",
          "description":"test_US1",
          "sent_at":"*",
          "expire_at":"*",
          "responses_count":0,
          "owner":
            {
              "id":"*",
              "type":"group",
              "group_type":1,
              "avatar_file_path":"*",
              "official_title":"The United States of America"
            },
          "entity":
            {
              "type":"question",
              "id":"*"
            }
        }
      ]
    """