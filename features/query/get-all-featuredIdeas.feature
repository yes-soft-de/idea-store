Feature: Getting all Featured Ideas
  Scenario: Getting an array of all Featured Ideas
    Given I have access to backend
    When I request all Featured Ideas
    Then I should get a response code with "200"
    And I should get a valid json
    And I should get the message fetched successfully