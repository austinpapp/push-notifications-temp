@groups @create-group
Feature: User should be able to create a group

  Background: Mobile user
    Given A mobile user with username "test" and password "test1"
    And Logged in as mobile user "test"

  Scenario: form data should be validated
    When call POST "/api/groups/" with data:
    """
     {
        "username": "",
        "official_type": "",
        "official_title": ""
      }
    """
    Then response status should be "400"
    And json response should be:
    """
      {
        "errors":[
          {
            "property":"username",
            "message":"This value should not be blank."
          },
          {
            "property":"officialName",
            "message":"This value should not be blank."
          },
          {
            "property":"officialType",
            "message":"This value should not be blank."
          }
        ]
      }
    """

  Scenario: should create from and auto join user
    When call POST "/api/groups/" with data:
    """
     {
        "username": "test",
        "manager_first_name": "Test",
        "manager_last_name": "Test2",
        "manager_email": "mihail@powerli.ne",
        "manager_phone": "777",
        "official_type": "Other",
        "official_title": "TEST",
        "official_description": "test description",
        "acronym": "TES",
        "official_address": "",
        "official_city": "Ocean",
        "official_state": "NJ"
      }
    """
    Then response status should be "201"
    And json response should be:
    """
      {
        "id":"*",
        "group_type":0,
        "avatar_file_path":"*",
        "manager_phone":"777",
        "official_title":"TEST",
        "official_description":"test description",
        "acronym":"TES",
        "official_address":"",
        "official_city":"Ocean",
        "official_state":"NJ",
        "joined":1,
        "total_members":1,
        "membership_control":0,
        "fill_fields_required":false,
        "required_permissions":[]
      }
    """
  Scenario: user can create only 5 groups
    When call POST "/api/groups/" with data:
    """
     {
        "username": "test1",
        "official_type": "test",
        "official_title": "test"
      }
    """
    And call POST "/api/groups/" with data:
    """
     {
        "username": "test2",
        "official_type": "test",
        "official_title": "test"
      }
    """
    And call POST "/api/groups/" with data:
    """
     {
        "username": "test3",
        "official_type": "test",
        "official_title": "test"
      }
    """
    And call POST "/api/groups/" with data:
    """
     {
        "username": "test4",
        "official_type": "test",
        "official_title": "test"
      }
    """
    And call POST "/api/groups/" with data:
    """
     {
        "username": "test5",
        "official_type": "test",
        "official_title": "test"
      }
    """
    Then response status should be "201"
    And call POST "/api/groups/" with data:
    """
     {
        "username": "test6",
        "official_type": "test",
        "official_title": "test"
      }
    """
    And response status should be "403"
    And json response should be:
    """
      {
        "error": "You have reached a limit for creating groups"
      }
    """

  Scenario: group username should be unique
    When call POST "/api/groups/" with data:
    """
     {
        "username": "test1",
        "official_type": "test",
        "official_title": "test"
      }
    """
    And call POST "/api/groups/" with data:
    """
     {
        "username": "test1",
        "official_type": "test",
        "official_title": "test"
      }
    """
    Then response status should be "400"
    And json response should be:
    """
      {
        "errors":[
          {
            "property":"username",
            "message":"This value is already used."
          }
        ]
      }
    """