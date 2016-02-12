@micro-petitions
Feature: Get micro-petitions by query
  Background: Mobile users and initial micropetitions
    Given A mobile user with username "test1" and password "test1"
    And A mobile user with username "test2" and password "test2"
    And There are micropetitions:
    | user   | group | type              | title           | body         |
    | test1  | US    | quorum            |                 | first        |
    | test1  | US    | quorum            |                 | second       |
    | test2  | US    | long petition     | test2_title     | first        |

  Scenario: Get own
    Given Logged in as mobile user "test1"
    When call GET "/api/micro-petitions/?start=2014-01-01&user=1"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "quorum_count":0,
          "id":"*",
          "title":"",
          "petition_body":"first",
          "group":{
            "id":1,
            "group_type":1,
            "avatar_file_path":"*",
            "official_title":"The United States of America"
          },
          "group_id":1,
          "created_at":"*",
          "expire_at":"*",
          "user":{
            "full_name":"test1 test1",
            "id":1,
            "username":"test1",
            "first_name":"test1",
            "last_name":"test1",
            "avatar_file_name":"*"
          },
          "publish_status":0,
          "type":"quorum",
          "cached_hash_tags":[],
          "responses_count":0
        },
        {
          "quorum_count":0,
          "id":"*",
          "title":"",
          "petition_body":"second",
          "group":{
            "id":1,
            "group_type":1,
            "avatar_file_path":"*",
            "official_title":"The United States of America"
          },
          "group_id":1,
          "created_at":"*",
          "expire_at":"*",
          "user":{
            "full_name":"test1 test1",
            "id":1,
            "username":"test1",
            "first_name":"test1",
            "last_name":"test1",
            "avatar_file_name":"*"
          },
          "publish_status":0,
          "type":"quorum",
          "cached_hash_tags":[],
          "responses_count":0
        }
      ]
    """

  Scenario: Get own
    Given Logged in as mobile user "test1"
    When call GET "/api/micro-petitions/?start=2014-01-01&user=2"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "quorum_count":0,
          "id":"*",
          "title":"test2_title",
          "petition_body":"first",
          "group":{
            "id":1,
            "group_type":1,
            "avatar_file_path":"*",
            "official_title":"The United States of America"
          },
          "group_id":1,
          "created_at":"*",
          "expire_at":"*",
          "user":{
            "full_name":"test2 test2",
            "id":2,
            "username":"test2",
            "first_name":"test2",
            "last_name":"test2",
            "avatar_file_name":"*"
          },
          "publish_status":0,
          "type":"long petition",
          "cached_hash_tags":[],
          "responses_count":0
        }
      ]
    """