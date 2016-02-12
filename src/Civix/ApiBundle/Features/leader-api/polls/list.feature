@api @leader-api
Feature: List of polls

  Background:
    Given A group with username "test" and password "test1"
    And There are published questions
      | subject     | type           | owner          | username           |
      | test_group  | Group          | Group          | test               |
      | test_repr   | Representative | Representative | testrepresentative |
      | test_admin  | Superuser      | Superuser      | admin              |

  Scenario: List for group
    Given I am logged in as "test" group
    When call GET "/api-leader/polls/?mine"
    Then json response should be:
    """
      [
        {
          "id": "*",
          "created_at": "*",
          "expire_at":"*",
          "options":"*",
          "published_at":"*",
          "subject":"test_group",
          "user":"*"
        }
      ]
    """

  Scenario: List for representative
    Given I am logged in as "testrepresentative" representative
    When call GET "/api-leader/polls/?mine"
    Then json response should be:
    """
      [
        {
          "id": "*",
          "created_at": "*",
          "expire_at":"*",
          "options":"*",
          "published_at":"*",
          "subject":"test_repr",
          "user":"*"
        }
      ]
    """

  Scenario: List for superuser
    Given I am logged in as "admin" superuser
    When call GET "/api-leader/polls/?mine"
    Then json response should be:
    """
      [
        {
          "id": "*",
          "created_at": "*",
          "expire_at":"*",
          "options":"*",
          "published_at":"*",
          "subject":"test_admin",
          "user":"*"
        }
      ]
    """

  Scenario: List of news (discussions) for representative
    Given There are published representative news
      | subject                   | username              |
      | Joseph Biden Test         | JosephBiden           |
    And I am logged in as "JosephBiden" representative
    When call GET "/api-leader/polls/?mine&type=news"
    Then json response should be:
    """
      [
        {
          "id": "*",
          "created_at": "*",
          "options":"*",
          "published_at":"*",
          "subject":"Joseph Biden Test",
          "subject_parsed":"Joseph Biden Test",
          "user":"*"
        }
      ]
    """