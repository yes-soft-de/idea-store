Feature: Getting all images
  Scenario: Getting an array of all images
    Given I have access to backend
    When I request all images
    Then I should get a response code with "200"
    Then I should get a valid json