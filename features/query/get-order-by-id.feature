Feature: Get single order
  Scenario: Get an order by Id
    Given I have access to backend
    When I request order with ID "3"
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain a valid order
    And I should get the message fetched successfully