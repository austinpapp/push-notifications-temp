Feature: Manage posts
    Scenario: As admin I can to see list of post
        Given I am logged in as Administrator
          And I go to "/superuser/post"
         Then the response status code should be 200
          And the url should match "/superuser/post"

    Scenario: As admin I can to see form for create new post
        Given I am logged in as Administrator
          And I go to "/superuser/post/new"
         Then the response status code should be 200
          And the url should match "/superuser/post/new"
