@sprint3
Feature: (Req ID: 9) For the paper list, allow users to 
	select a subset to generate a new word cloud from

Scenario: User can select subset to do new search

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 30 seconds
Then I click on "with"
And I check the first check box in the table
And I press "SubSearch"
And I wait for 25 seconds
Then I click on "with"
And I should see "result"