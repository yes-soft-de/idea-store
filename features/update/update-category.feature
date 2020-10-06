Feature: Update category
  Scenario: Update category from json file
    Given I am an unsigned in user
    When I request category update of ID "1"
    Then I should get a response code with "200"
    And I should get the message update successfully