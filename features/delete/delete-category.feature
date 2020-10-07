Feature: Delete a category
  Scenario: Delete a category by Id
    Given I am signed in admin
    When I request delete a category of ID "15"
    Then I should get a response code with "200"
    And I expect json response contain message of deleted successfully
