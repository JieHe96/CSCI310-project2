Feature: (Req ID: 2) User can input the desired number of papers 
		  that is going to be returned
Scenario: User can input X in a textbox on initial page

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "wang"
When I fill in "x_input" with "5"
	And I press "searchbutton"
	And I wait for 15 seconds
Then I should see "beam"
	And I should see "factor"
	And I should not see "attack"
