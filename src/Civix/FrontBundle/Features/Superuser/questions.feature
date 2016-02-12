Feature: Manage questions
    Scenario: As admin I can to see list of questions
        Given I am logged in as Administrator
          And I go to "/superuser/question"
         Then the response status code should be 200
          And the url should match "/superuser/question"

    Scenario: As admin I can to see list of sending out response
        Given I am logged in as Administrator
          And I go to "/superuser/question/sending-out-response"
         Then the response status code should be 200
          And the url should match "/superuser/question/sending-out-response"

    Scenario: As admin I can to see list of archived questions
        Given I am logged in as Administrator
          And I go to "/superuser/question/archive"
         Then the response status code should be 200
          And the url should match "/superuser/question/archive"

    Scenario: As admin I can to see form for create new question
        Given I am logged in as Administrator
          And I go to "/superuser/question/new"
         Then the response status code should be 200
          And the url should match "/superuser/question/new"
