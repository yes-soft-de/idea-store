Feature: Create a special idea
  Scenario: Create a special idea from valid json
    Given I am signed in user
    And I have a valid special idea data
    When I request create a special idea with the data I have and category ID "1"
    Then I should get a response code with "200"
    And The json should contain the new special idea