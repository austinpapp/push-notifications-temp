@questions @answers
Feature: answer to question
  Background: Mobile user
    Given A mobile user with username "test" and password "test1"
    And user "test" has representative district "JosephBiden"
    And Logged in as mobile user "test"
    And There are published questions
      | subject                          | type           | owner          | username    |
      | test_US1                         | Group          | Group          | US          |
      | test_superuser                   | Superuser      | Superuser      | admin       |
      | test representative JosephBiden  | Representative | Representative | JosephBiden |

  Scenario: answers list
    Given User "test" answered to questions
      | question                        |
      | test_US1                        |
      | test_superuser                  |
    When call GET "/api/poll/answers/"
    Then response status should be "200"
    And json response should be:
      """
         [
            {
              "id": "*",
              "option_id": "*",
              "question": {
                "id": "*"
              }
            },
            {
              "id": "*",
              "option_id": "*",
              "question": {
                "id": "*"
              }
            }
         ]
      """