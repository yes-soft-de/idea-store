Feature: Getting all orders
  Scenario: Getting an array of all orders
    Given I have access to backend
    When I request all orders
    Then I should get a response code with "200"
    Then I should get a valid json