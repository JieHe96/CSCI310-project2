@sprint2
Feature: (Req ID: 7a) For each paper, clicking on a paper's title will allow the user to read the abstract with the word highlighted

Scenario: When I click on a paper's title, I should be able to see the abstract with the word highlighted

Given I am on "/WordCloud.html"
And I fill in "search_input" with "steven"
And I fill in "x_input" with "10"
And I press "searchbutton"
And I wait for 30 seconds
Then I click on "with"
Then I click on "Methodological Triangulation Using Neural Networks for Business Research" in the table
