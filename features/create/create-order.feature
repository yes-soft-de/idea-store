Feature: Create an order
  Scenario: Create an order
    Given I am signed in user
    When I request create an order with project ID "1" and user ID "4"
    Then I should get a response code with "200"
    And The json should contain the new order