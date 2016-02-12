@micro-petitions
Feature: create micro-petitions

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"
    And A mobile user with username "test2" and password "test1"
    And "test2" follow "test"
    And Logged in as mobile user "test"

  Scenario: Create micro-petition
    When call POST "/api/micro-petitions" with data:
    """
      {
        "group_id":1,
        "user_expire_interval":7,
        "type":"quorum",
        "petition_body":"test"
      }
    """
    Then response status should be "200"
    And json response should be:
    """
      {
        "id":1,
        "group":{"id":1,"group_type":1,"avatar_file_path":"*","official_title":"The United States of America"},
        "created_at":"*",
        "expire_at":"*",
        "user":{
          "full_name":"test test",
          "id":"*",
          "username":"test",
          "first_name":"test",
          "last_name":"test",
          "avatar_file_name":"*"
        },
        "publish_status":0,
        "type":"quorum",
        "options":[{"id":"*","value":"Upvote","votes_count":0},{"id":"*","value":"Downvote","votes_count":0}],
        "cached_hash_tags":[]
      }
    """
    Then  Logged in as mobile user "test2"
    And call GET "/api/social-activities/"
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
            "full_name": "test test",
            "avatar_file_name": "*",
            "official_title": "test test"
          },
          "group":{"id":1,"type":"group","group_type":1,"avatar_file_path":"*","official_title":"The United States of America"},
          "type": "micropetition-created",
          "target": "*",
          "tab": "following",
          "html_message": "<p><strong>test test</strong> posted in the <strong>The United States of America</strong> community</p>"
        }
      ]
    """

Scenario: Create long petition
  When call POST "/api/micro-petitions" with data:
  """
    {
      "group_id":1,
      "user_expire_interval":7,
      "type":"long petition",
      "petition_body":"test body",
      "title": "test title"
    }
  """
  Then response status should be "200"
  And json response should be:
  """
    {
      "id":1,
      "group":{"id":1,"group_type":1,"avatar_file_path":"*","official_title":"The United States of America"},
      "created_at":"*",
      "expire_at":"*",
      "user":{
        "full_name":"test test",
        "id":"*",
        "username":"test",
        "first_name":"test",
        "last_name":"test",
        "avatar_file_name":"*"
      },
      "publish_status":0,
      "type":"long petition",
      "options":[{"id":"*","value":"Upvote","votes_count":0},{"id":"*","value":"Downvote","votes_count":0}],
      "cached_hash_tags":[]
    }
  """
  Then  Logged in as mobile user "test2"
  And call GET "/api/social-activities/"
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
          "full_name": "test test",
          "avatar_file_name": "*",
          "official_title": "test test"
        },
        "group":{"id":1,"type":"group","group_type":1,"avatar_file_path":"*","official_title":"The United States of America"},
        "type": "micropetition-created",
        "target": "*",
        "tab": "following",
        "html_message": "<p><strong>test test</strong> created a petition in the <strong>The United States of America</strong> community</p>"
      }
    ]
  """

  Scenario: User cannot create micropetition more than limit per month
    Given A group "US" with data:
    | property          | value |
    | PetitionPerMonth  | 0     |
    When call POST "/api/micro-petitions" with data:
    """
      {
        "group_id":1,
        "user_expire_interval":7,
        "type":"quorum",
        "petition_body":"test"
      }
    """
    Then response status should be "406"
