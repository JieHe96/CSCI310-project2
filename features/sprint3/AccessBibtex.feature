@sprint2
Feature: (Req ID: 6b) For each paper, provide links to access its bibtex

Scenario: user can access the bibtex of searched papers

Given I am on "/WordCloud.html"
And I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 28 seconds
Then I click on "with"
Then I click on "Bibtex" in the first row of bibtext column
And I wait for 3 seconds
Then I go to "about:blank"