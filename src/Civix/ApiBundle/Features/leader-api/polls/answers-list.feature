@api @leader-api
Feature: List of answers

  Background:
    Given A mobile user with username "test" and password "test1"
    And user "test" has representative district "JosephBiden"
    And There are published questions
      | subject | type           | owner          | username    |
      | test    | Representative | Representative | JosephBiden |
    And User "test" answered to questions
      | question |
      | test     |

  Scenario:
    Given I am logged in as "JosephBiden" representative
    When call GET "/api-leader/polls/1/answers/"
    Then json response should be:
    """
      [
        {
          "id": "*",
          "user": "*",
          "option_id":"*",
          "created_at":"*"
        }
      ]
    """