Feature: Get single project
  Scenario: Get a project by Id
    Given I have access to backend
    When I request project with ID "1"
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain a valid project
    And I should get the message fetched successfully