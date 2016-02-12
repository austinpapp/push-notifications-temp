@api @secure @registration
Feature: Mobile user registration

  Scenario: normal registration
    When call POST "/api/secure/registration" with data:
    """
      username=test&password=test&first_name=first_name&last_name=last_name&email=test%40intellectsoft.org&address1=test+address&city=Ocean&state=NJ&zip=111&country=US
    """
    Then response status should be "200"
    And json response should be:
    """
       {
          "id": "*",
          "username": "test",
          "token": "*",
          "is_registration_complete": true
       }
    """
    And user "test" has groups:
    | username |
    | US       |
    | NJ       |

  Scenario: invalid username
    When call POST "/api/secure/registration" with data:
    """
      username=test.&password=test&first_name=first_name&last_name=last_name&email=test+1%40powerli.ne&address1=test+address&city=Ocean&state=NJ&zip=111&country=US
    """
    Then response status should be "400"
    When call POST "/api/secure/registration" with data:
    """
      username=tes?t&password=test&first_name=first_name&last_name=last_name&email=test+2%40powerli.ne&address1=test+address&city=Ocean&state=NJ&zip=111&country=US
    """
    Then response status should be "400"