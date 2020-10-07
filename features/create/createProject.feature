Feature: Create Project
  Scenario: Create project from valid json
    Given I am an unsigned in user
    And I have a valid project data
    When I request project create with the data I have and Category ID "6"
    Then I should get a response code with "200"