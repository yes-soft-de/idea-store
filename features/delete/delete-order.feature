Feature: Delete an order
  Scenario: Delete an order by Id
    Given I am signed in admin
    When I request delete an order of ID "7"
    Then I should get a response code with "200"
    And I expect json response contain message of deleted successfully