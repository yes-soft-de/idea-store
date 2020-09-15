Feature: Users Getting Feature
  Scenario: Getting Users List
    Given I have access to backend
    When I request users list
    Then I should get a response code with "200"
    Then I should get a valid json