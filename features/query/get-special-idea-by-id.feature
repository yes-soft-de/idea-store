Feature: Get single special idea
  Scenario: Get a special idea by Id
    Given I have access to backend
    When I request special idea with ID "1"
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain valid new idea
    And I should get the message fetched successfully