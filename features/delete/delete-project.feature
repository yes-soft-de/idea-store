Feature: Delete a project
  Scenario: Delete a project by Id
    Given I am signed in admin
    When I request delete a project of ID "24"
    Then I should get a response code with "200"
    And I expect json response contain message of deleted successfully