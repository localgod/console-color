Feature: Identify
  In order print colored strings in console
  As a developer
  I want to

  Scenario: Print the output red
    Given I can access Color
    When I call the convert method with the red argument
    Then I should get a string in a red font