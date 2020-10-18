Feature: Getting all special ideas
  Scenario: Getting an array of all special ideas
    Given I have access to backend
    When I request all special ideas
    Then I should get a response code with "200"
    And I should get a valid json
    And I should get the message fetched successfully