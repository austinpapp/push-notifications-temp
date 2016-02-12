Feature: Manage questions
    Scenario: As representative I can see the list of questions
        Given I am logged in as Representative
          And I go to "/representative/question"
         Then the response status code should be 200
          And the url should match "/representative/question"

    Scenario: As representative I can see the list of sending out response
        Given I am logged in as Representative
          And I go to "/representative/question/sending-out-response"
         Then the response status code should be 200
          And the url should match "/representative/question/sending-out-response"

    Scenario: As representative I can see the list of archived questions
        Given I am logged in as Representative
          And I go to "/representative/question/archive"
         Then the response status code should be 200
          And the url should match "/representative/question/archive"

    Scenario: As representative I can see form for creation a new question
        Given I am logged in as Representative
          And I go to "/representative/question/new"
         Then the response status code should be 200
          And the url should match "/representative/question/new"
