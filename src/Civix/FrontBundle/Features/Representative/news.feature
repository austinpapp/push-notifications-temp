Feature: Manage news
    Scenario: As representative I can see the list of news
        Given I am logged in as Representative
          And I go to "/representative/news"
         Then the response status code should be 200
          And the url should match "/representative/news"

    Scenario: As representative I can see form for creation news
        Given I am logged in as Representative
          And I go to "/representative/news/new"
         Then the response status code should be 200
          And the url should match "/representative/news/new"