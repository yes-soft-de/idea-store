Feature: Delete an article
  Scenario: Delete an article by Id
    Given I am signed in admin
    When I request delete an article of ID "15"
    Then I should get a response code with "200"
    And I expect json response contain message of deleted successfully