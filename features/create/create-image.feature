Feature: Create an image
  Scenario: Create a new image with specific project
    Given I am signed in admin
    And I have an exist project ID "20"
    And I have a valid image data
    When I request image create with the data I have
    Then I should get a response code with "200"