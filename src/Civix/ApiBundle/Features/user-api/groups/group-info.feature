@groups
Feature: User should be able to get information about group

    Background: Mobile user
        Given A mobile user with username "test" and password "test1"
        And Logged in as mobile user "test"
        And A group with username "group" and password "group"
        And A group "group" with data:
        | property            | value              |
        | RequiredPermissions | permission_name    |
        
    Scenario: Get information about group
        When I call GET /api/groups/info/:id, where :id is id of group "group"
        Then response status should be "200"
         And json response should be:
         """
            {
                "id":"*",
                "group_type":0,
                "avatar_file_path":"*",
                "joined":0,
                "total_members":0,
                "membership_control":0,
                "fill_fields_required":false,
                "required_permissions":["permission_name"]
            }
         """