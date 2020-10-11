Feature: Update an article
  Scenario: Update an article from json file
    Given I am signed in admin
    When I request article update of ID "1"
    Then I should get a response code with "200"
    And I should get the message update successfully