@sprint2
Feature: (Req ID: 3) Access previously entered searches

Scenario: user can access previously entered searches and 
	initiate new search

Given I am on "/WordCloud.html"
	And I fill in "search_input" with "steven"
	And I press "searchbutton"
When I move the mouse over ".dropdown-content" element
	Then I can see "steven" in the ".dropdown-content" element
	And I wait for 25 seconds
Then I fill in "search_input" with "wang"
	And I press "searchbutton"
	And I wait for 25 seconds

Then I click on "steven"
	And I wait for 25 seconds
	Then I should see "system"

