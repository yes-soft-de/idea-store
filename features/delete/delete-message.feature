Feature: Delete a message
  Scenario: Delete a message by Id
    Given I am signed in admin
    When I request delete a message of ID "1"
    Then I should get a response code with "200"
    And I expect json response contain message of deleted successfully