Feature: Create Project
  Scenario: Create project from valid json
    Given I am signed in admin
    And I have a valid project data
    When I request project create with the data I have and Category ID "6"
    Then I should get a response code with "200"