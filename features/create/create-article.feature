Feature: Create an article
  Scenario: Create an article from valid Json
    Given I am signed in admin
    And I have a valid article data
    When I request article create with the data I have
    Then I should get a response code with "200"
    And The json should contain the new article