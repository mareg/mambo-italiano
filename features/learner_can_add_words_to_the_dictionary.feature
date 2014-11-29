Feature: A learner can see a dictionary
  In order to keep learning new words
  As a learner
  I should be able to add new words to the dictionary

  Rules:
    A word can be a noun, verb or adjective (for now)
    A word can have multiple meanings (both ways)
    A noun can have a gender defined: muscilne, feminine or neutral

  Scenario: Learner can add a new word to the dictionary
    Given the word "ciao" has not been added to the dictionary
    When I add the new word "ciao" with a translation "hello"
    And I search for word "ciao" in the dictionary
    Then the search result for word "ciao" should include translation "hello"

  Scenario: Learner can see and browse existing words
    Given the word "ciao" with translation "hello" has been added to the dictionary
    And the word "arrivederci" with translation "goodbye" has been added to the dictionary
    When I search for word "ciao" in the dictionary
    Then the search result for word "ciao" should include translation "hello"

  Scenario: Learner cannot add existing word to the dictionary
    Given the word "ciao" with translation "hello" has been added to the dictionary
    When I add the new word "ciao" with a translation "hello"
    Then I should see a notification that the word "ciao" already exists in the dictionary

  Scenario: Learner can add a new translation to the existing word in the dictionary
    Given the word "ciao" with translation "hello" has been added to the dictionary
    When I add the new word "ciao" with a translation "goodbye"
    And I search for word "ciao" in the dictionary
    Then I should see the word "ciao" with 2 translations in the dictionary