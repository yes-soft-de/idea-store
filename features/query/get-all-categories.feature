Feature: Getting all categories
  Scenario: Getting an array of all categories
    Given I have access to backend
    When I request all categories
    Then I should get a response code with "200"
    Then I should get a valid json