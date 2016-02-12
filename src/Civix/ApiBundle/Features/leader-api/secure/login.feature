@api @leader-api
Feature: Leader login

  Scenario: Group auth fail
    Given A group with username "test" and password "test1"
    When call POST "/api-leader/sessions/" with data:
    """
      {
        "username": "test",
        "password": "test",
        "type": "group"
      }
    """
    Then response status should be "400"

  Scenario: Group login
    Given A group with username "test" and password "test1"
    When call POST "/api-leader/sessions/" with data:
    """
      {
        "username": "test",
        "password": "test1",
        "type": "group"
      }
    """
    Then response status should be "201"
    And json response should be:
    """
       {
         "id":"*",
         "token":"*",
         "user_type":"group"
       }
    """

  Scenario: Superuser login
    When call POST "/api-leader/sessions/" with data:
    """
      {
        "username": "admin",
        "password": "admin",
        "type": "superuser"
      }
    """
    Then response status should be "201"
    And json response should be:
    """
       {
         "id":"*",
         "token":"*",
         "user_type":"superuser"
       }
    """

  Scenario: Representative login
    When call POST "/api-leader/sessions/" with data:
    """
      {
        "username": "testrepresentative",
        "password": "testrepresentative7ZAPe3QnZhbdec",
        "type": "representative"
      }
    """
    Then response status should be "201"
    And json response should be:
    """
       {
         "id":"*",
         "token":"*",
         "user_type":"representative"
       }
    """

  Scenario: Access denied for non-authenticated
    When call GET "/api-leader/polls/"
    Then response status should be "401"

  Scenario: Access allowed
    Given I am logged in as "admin" superuser
    When call GET "/api-leader/polls/"
    Then response status should be "200"