Feature: Manage payment-request
    Scenario: As group I can see the list of payment requests
        Given I am logged in as Group
          And I go to "/group/payment-request"
         Then the response status code should be 200
          And the url should match "/group/payment-request"

    Scenario: As group I can see form for creation a new payment request
        Given I am logged in as Group
          And I go to "/group/payment-request/new"
         Then the response status code should be 200
          And the url should match "/group/payment-request/new"
    