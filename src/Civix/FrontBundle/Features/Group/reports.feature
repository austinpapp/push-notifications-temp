Feature: View reports
    Scenario: As group I can see report of question
        Given I am logged in as Group
          And I go to "/group/reports"
         Then the response status code should be 200
          And the url should match "/group/reports"

    Scenario: As group I can see report of payment request
        Given I am logged in as Group
          And I go to "/group/reports/payment-requests"
         Then the response status code should be 200
          And the url should match "/group/reports/payment-requests"

    Scenario: As group I can see report of events
        Given I am logged in as Group
          And I go to "/group/reports/events"
         Then the response status code should be 200
          And the url should match "/group/reports/events"

    Scenario: As group I can see report of membership
        Given I am logged in as Group
          And I go to "/group/reports/membership"
         Then the response status code should be 200
          And the url should match "/group/reports/membership"