@sprint2
Feature: (Req ID: 11) For each paper, clicking on an author in its author list will do a new search based on that author

Scenario: When I click on an author, I should be able to search for the author

Given I am on "/WordCloud.html"
And I fill in "search_input" with "steven"
And I fill in "x_input" with "10"
And I press "searchbutton"
And I wait for 25 seconds
Then I click on "with"
Then I click on "Steven Walczak" in the table
And I wait for 25 seconds
Then I should see "ffi"
