Feature: Get single category
  Scenario: Get a category by Id
    Given I have a category Id of "1"
    And I have access to backend
    When I request category by Id
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain valid category