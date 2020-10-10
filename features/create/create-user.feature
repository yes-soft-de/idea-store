Feature: Create a user
  Scenario: Create a user from valid json
    Given I am an unsigned in user
    And I have a valid user data
    When I request user create with the data I have
    Then I should get a response code with "200"