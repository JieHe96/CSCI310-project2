@sprint3
Feature: (Req ID: 7a) For each paper, clicking on a paper’s title 
			will allow the user to read the abstract with the 
			word(s) highlighted
Scenario: User can see highlighted abstract

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 25 seconds
Then I click on "crowd"
And I click on "Improving Crowd Innovation with Expert Facilitation"
And I should word "crowd" highlighted in the abstract