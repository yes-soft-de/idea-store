Feature: Getting all messages
  Scenario: Getting an array of all messages
    Given I have access to backend
    When I request all messages
    Then I should get a response code with "200"
    Then I should get a valid json