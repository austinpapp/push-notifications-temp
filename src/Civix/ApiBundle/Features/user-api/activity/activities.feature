@activities
Feature: list of open activity items

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"

  Scenario: user should be logged in
    When call GET "/api/activities/"
    Then response status should be "401"

  Scenario: empty list
    Given Logged in as mobile user "test"
    When call GET "/api/activities/"
    Then response status should be "200"
    And json response should be:
    """
      []
    """
  Scenario: group questions
    Given Logged in as mobile user "test"
    And There are published questions
      | subject   | type      | owner      | username |
      | test_US1  | Group     | Group      | US       |
      | test_US2  | Group     | Group      | US       |
      | test_NJ1  | Group     | Group      | NJ       |
    And There are activity for questions
      | question  |
      | test_US1  |
      | test_US2  |
      | test_NJ1  |
    When call GET "/api/activities/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id":"*",
          "title":"",
          "description":"test_NJ1",
          "sent_at":"*",
          "expire_at":"*",
          "responses_count":0,
          "owner":
            {
              "id":31,
              "type":"group",
              "group_type":2,
              "avatar_file_path":"*",
              "official_title":"New Jersey"
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
          "description":"test_US2",
          "sent_at":"*",
          "expire_at":"*",
          "responses_count":0,
          "owner":
            {
              "id":1,
              "type":"group",
              "group_type":1,
              "avatar_file_path":"*",
              "official_title":"The United States of America"
            },
          "entity":
            {
              "type": "question",
              "id": "*"
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

  Scenario: superuser questions
    Given Logged in as mobile user "test"
    And There are published questions
      | subject         | type          | owner     | username |
      | test_superuser  | Superuser     | Superuser | admin    |
    And There are activity for questions
      | question        |
      | test_superuser  |
    When call GET "/api/activities/"
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
        }
      ]
    """

  Scenario: representative questions
    Given user "test" has representative district "JosephBiden"
    And Logged in as mobile user "test"
    And There are published questions
      | subject                          | type               | owner          | username              |
      | test representative JosephBiden  | Representative     | Representative | JosephBiden           |
      | test testrepresentative          | Representative     | Representative | testrepresentative    |
    And There are activity for questions
      | question                         |
      | test representative JosephBiden  |
      | test testrepresentative          |
    When call GET "/api/activities/"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
            "id": "*",
            "title": "",
            "description": "test testrepresentative",
            "sent_at": "*",
            "expire_at": "*",
            "responses_count": 0,
            "owner": {
                "id": "*",
                "type": "representative",
                "first_name": "testrepresentative",
                "last_name": "testrepresentative",
                "avatar_file_path": "*",
                "official_title": "test representative"
            },
            "entity": {
                "type": "question",
                "id": "*"
            }
        },
        {
            "id": "*",
            "title": "",
            "description": "test representative JosephBiden",
            "sent_at": "*",
            "expire_at": "*",
            "responses_count": 0,
            "owner": {
                "id": "*",
                "type": "representative",
                "first_name": "Joseph",
                "last_name": "Biden",
                "avatar_file_path": "*",
                "official_title": "Vice President",
                "storage_id": 44926
            },
            "entity": {
                "type": "question",
                "id": "*"
            }
        }
      ]
    """

  Scenario: expired items
    Given Logged in as mobile user "test"
    And There are published questions
      | subject         | type      | owner          | username |
      | test_US1        | Group     | Group          | US       |
      | test_superuser  | Superuser | Superuser      | admin       |
    And There are activity for questions
      | question        | expired_interval_direction  | expired_interval_value |
      | test_US1        | sub                         | P2D                    |
      | test_superuser  | sub                         | P5D                    |
    When call GET "/api/activities/"
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
