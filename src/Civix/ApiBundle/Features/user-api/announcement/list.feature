@announcement
Feature: list of annoncements
  Background: mobile users
    Given A mobile user with username "test1" and password "test1"
      And A mobile user with username "test2" and password "test2"
      And user "test1" has representative district "testrepresentative"

  Scenario: As user I can see empty list of announcements
    Given Logged in as mobile user "test2"
     When call GET "/api/announcements?start=2010-01-01"
     Then response status should be "200"
      And json response should be:
    """
      []
    """

  Scenario: As user I can see list of announcements
    Given Logged in as mobile user "test1"
     When call GET "/api/announcements?start=2010-01-01"
     Then response status should be "200"
     And json response should be:
    """
    [
        {
            "id": "*",
            "content_parsed": "testPublish",
            "published_at": "*",
            "user": {
                "id": "*",
                "type": "representative",
                "first_name": "testrepresentative",
                "last_name": "testrepresentative",
                "avatar_file_path": "*",
                "official_title": "test representative"
            }
        }
    ]
    """
      