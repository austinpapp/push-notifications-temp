Feature: Manage news
    Scenario: As group I can see the list of news
        Given I am logged in as Group
          And I go to "/group/news"
         Then the response status code should be 200
          And the url should match "/group/news"

    Scenario: As group I can see form for creation news
        Given I am logged in as Group
          And I go to "/group/news/new"
         Then the response status code should be 200
          And the url should match "/group/news/new"