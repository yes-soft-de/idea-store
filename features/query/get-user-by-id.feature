Feature: Get single user
  Scenario: Get a user by Id
    Given I have a user Id of "1"
    And I have access to the user query endpoint
    When I request user by Id
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain valid user name

  Scenario: Get a user by non-exist Id
    Given I have a wrong user Id of "100"
    And I have access to the user query endpoint
    When I request user by Id
    Then I should get a response code with "200"
    And I should get a valid json
    And I expect json response contain null value
    And I expect json response contain message of Data not found