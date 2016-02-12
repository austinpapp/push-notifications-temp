@api @secure @login
Feature: Login mobile user

  Scenario: login by username and password
    Given A mobile user with username "test" and password "test1"
    When call POST "/api/secure/login" with data:
    """
      username=test&password=test1
    """
    Then response status should be "200"
    And json response should be:
    """
       {
         "id":"*",
         "username":"test",
         "token":"*",
         "is_registration_complete":true
       }
    """