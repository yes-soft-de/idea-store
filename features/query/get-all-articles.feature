Feature: Getting all articles
  Scenario: Getting an array of all articles
    Given I have access to backend
    When I request all articles
    Then I should get a response code with "200"
    Then I should get a valid json