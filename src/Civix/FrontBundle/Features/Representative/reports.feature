Feature: View reports
    Scenario: As representative I can see report of question
        Given I am logged in as Representative
          And I go to "/representative/reports"
         Then the response status code should be 200
          And the url should match "/representative/reports"

    Scenario: As representative I can see report of payment request
        Given I am logged in as Representative
          And I go to "/representative/reports/payment-requests"
         Then the response status code should be 200
          And the url should match "/representative/reports/payment-requests"

    Scenario: As representative I can see report of events
        Given I am logged in as Representative
          And I go to "/representative/reports/events"
         Then the response status code should be 200
          And the url should match "/representative/reports/events"
