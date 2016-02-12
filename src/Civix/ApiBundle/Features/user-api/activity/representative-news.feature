@activity @representative-news
Feature: activity items for representative news

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"
    And user "test" has representative district "JosephBiden"
    And Logged in as mobile user "test"

  Scenario: open representative news
    Given There are published representative news
      | subject                   | username              |
      | Joseph Biden news         | JosephBiden           |
      | testrepresentative  news  | testrepresentative    |
    When call GET "/api/activity/?start=2014-01-01"
    Then response status should be "200"
    And json response should be:
    """
        [
            {
                "id": 2,
                "title": "",
                "description": "testrepresentative news",
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
                    "type": "leader-news",
                    "id": 2
                }
            },
            {
                "id": 1,
                "title": "",
                "description": "Joseph Biden news",
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
                    "type": "leader-news",
                    "id": 1
                }
            }
        ]
    """

  Scenario: closed representative news
    Given There are published representative news
      | subject                        | username       | expired_interval_direction  | expired_interval_value |
      | Joseph Biden open news         | JosephBiden    | add                         | P1D                    |
      | Joseph Biden closed news       | JosephBiden    | sub                         | P1D                    |
    When call GET "/api/activity/?start=2014-01-01&closed=1"
    Then response status should be "200"
    And json response should be:
    """
        [
          {
            "id":"*",
            "title":"",
            "description":"Joseph Biden closed news",
            "sent_at":"*",
            "expire_at":"*",
            "responses_count":0,
            "owner":
              {
                "id": "*",
                "type":"representative",
                "official_title":"Vice President",
                "avatar_file_path": "*",
                "first_name": "Joseph",
                "last_name": "Biden",
                "storage_id": "*"
              },
            "entity":
              {
                "type":"leader-news",
                "id":"*"
              }
          }
        ]
    """