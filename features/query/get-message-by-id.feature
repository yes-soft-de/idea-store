Feature: Get single message
  Scenario: Get a message by Id
    Given I have access to backend
    When I request message with ID "3"
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain a valid message
    And I should get the message fetched successfully