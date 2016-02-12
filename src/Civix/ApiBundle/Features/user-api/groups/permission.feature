@groups
Feature: User should be able to approve group permission

 Background: Mobile user
    Given A mobile user with username "test" and password "test1"
      And A group with username "group" and password "group"

  Scenario: user should be logged in
    When I call GET /api/groups/:id/permissions, where :id is id of group "group"
    Then response status should be "401"

  Scenario: user should be join to group
      When Logged in as mobile user "test"
       And I call GET /api/groups/:id/permissions, where :id is id of group "group"
      Then response status should be "404"

  Scenario: user should be get current approved permissions
      When Logged in as mobile user "test"
       And user "test" joined to group "group"
       And I call GET /api/groups/:id/permissions, where :id is id of group "group"
      Then response status should be "200"
       And json response should be:
       """
       {
            "id":"*",
            "status":"*",
            "permissions_name":false,
            "permissions_address":false,
            "permissions_email":false,
            "permissions_phone":false,
            "permissions_contacts":false,
            "permissions_responses":false
       }
       """

   Scenario: user should be update current approved permissions
      When Logged in as mobile user "test"
       And user "test" joined to group "group"
       And I call POST /api/groups/:id/permissions, where :id is id of group "group" with data:
        """
        {
            "permissions_name":true,
            "permissions_address":true,
            "permissions_responses":false
        }
        """
        Then response status should be "200"
        And json response should be:
        """
        {
            "id":"*",
            "status":"*",
            "permissions_name":true,
            "permissions_address":true,
            "permissions_contacts":false,
            "permissions_responses":false,
            "permissions_approved_at":"*"
        }
        """