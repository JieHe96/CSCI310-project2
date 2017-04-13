@sprint2
Feature: (Req ID: 11) For each paper, clicking on an author in its author list will do a new search based on that author

Scenario: When I click on an author, I should be able to search for the author

Given I am on "/WordCloud.html"
And I fill in "search_input" with "wang"
And I fill in "x_input" with "5"
And I press "searchbutton"
And I wait for 10 seconds
Then I should see "bunch"
When I click on "bunch"
And I click on "insert other author"
Then I should see "insert word"
