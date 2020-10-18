Feature: Delete a special idea
  Scenario: Delete a special idea by Id
    Given I am signed in admin
    When I request delete a special idea of ID "2"
    Then I should get a response code with "200"
    And I expect json response contain message of deleted successfully