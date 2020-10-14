Feature: Get both image and project
  Scenario: Get an image and related project by project Id
    Given I have a project Id of "9"
    And I have access to backend
    When I request image by project Id
    Then I should get a response code with "200"
    And I should get a valid json
    And The json should contain valid project and image