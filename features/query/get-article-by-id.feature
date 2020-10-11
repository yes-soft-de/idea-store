Feature: Get single article
  Scenario: Get an article by Id
    Given I have an article Id of "1"
    And I have access to the article query endpoint
    When I request article by Id
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain valid article title