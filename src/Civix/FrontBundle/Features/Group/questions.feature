Feature: Manage questions
    Scenario: As group I can see the list of questions
        Given I am logged in as Group
          And I go to "/group/question"
         Then the response status code should be 200
          And the url should match "/group/question"

    Scenario: As group I can see the list of sending out response
        Given I am logged in as Group
          And I go to "/group/question/sending-out-response"
         Then the response status code should be 200
          And the url should match "/group/question/sending-out-response"

    Scenario: As group I can see the list of archived questions
        Given I am logged in as Group
          And I go to "/group/question/archive"
         Then the response status code should be 200
          And the url should match "/group/question/archive"

    Scenario: As group I can see form for creation a new question
        Given I am logged in as Group
          And I go to "/group/question/new"
         Then the response status code should be 200
          And the url should match "/group/question/new"
