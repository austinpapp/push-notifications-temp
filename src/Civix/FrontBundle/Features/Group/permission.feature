Feature:Required permission settings
    Scenario: Get permission setting form
        Given I am logged in as Group
          And I go to "/group/permission-settings/"
         Then the response status code should be 200
          And the checkbox "Name" should not be checked
          And the checkbox "Responses" should not be checked
