Feature: Getting all categories with related projects
  Scenario: Getting an array of all projects belong to all categories
    Given I have access to backend
    When I request all projects with its categories
    Then I should get a response code with "200"
    Then I should get a valid json