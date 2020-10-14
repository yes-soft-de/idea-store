Feature: Update image by project ID
  Scenario: Update category from json file
    Given I am signed in admin
    When I request image update of project ID "15"
    Then I should get a response code with "200"
    And I should get the message update successfully
    And The updated image should be equal to the new value