Feature: Manage payment-request
    Scenario: As representative I can see the list of payment requests
        Given I am logged in as Representative
          And I go to "/representative/payment-request"
         Then the response status code should be 200
          And the url should match "/representative/payment-request"

    Scenario: As representative I can see form for creation a new payment request
        Given I am logged in as Representative
          And I go to "/representative/payment-request/new"
         Then the response status code should be 200
          And the url should match "/representative/payment-request/new"
    