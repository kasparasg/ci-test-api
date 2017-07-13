Feature: Phones feature
  As an API user, I want to access phone information

  Scenario: I successfully fetch the list of available phones
    When  I make GET request to "/api/phones"
    Then  The status code should be 200
    And   I should see 20 items
