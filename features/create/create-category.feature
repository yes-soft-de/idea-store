Feature: Create Category
  Scenario: Create category from valid Json
    Given I am signed in admin
    And I have a valid category data
    When I request category create with the data I have
    Then I should get a response code with "200"