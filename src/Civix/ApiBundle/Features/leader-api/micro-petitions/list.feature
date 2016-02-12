@api @leader-api
Feature: List of micro petitions

  Background:
    Given A mobile user with username "test1" and password "test1"
    And A mobile user with username "test2" and password "test2"
    And There are micropetitions:
      | user   | group | type              | title            | body     |
      | test1  | US    | quorum            |                  | second   |
      | test2  | US    | long petition     | title from test2 | first    |

  Scenario: List of micro petitions
    Given I am logged in as "US" group
    When call GET "/api-leader/micro-petitions/?mine"
    Then response status should be "200"
    And json response should be:
    """
      [
        {
          "id":"*",
          "title":"title from test2",
          "petition_body":"first",
          "group": "*",
          "group_id":1,
          "created_at":"*",
          "expire_at":"*",
          "user": "*",
          "publish_status":0,
          "is_outsiders_sign": false,
          "options": "*",
          "type":"long petition"
        },
        {
          "id":"*",
          "title":"",
          "petition_body":"second",
          "group": "*",
          "group_id":1,
          "created_at":"*",
          "expire_at":"*",
          "user": "*",
          "publish_status":0,
          "is_outsiders_sign": false,
          "options": "*",
          "type":"quorum"
        }
      ]
    """