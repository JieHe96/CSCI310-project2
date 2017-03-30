Feature: (Req ID: 2) User can input the desired number of papers 
		  that is going to be returned
Scenario: User can input X in a textbox on initial page

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
Then I can fill in "x_input" with "3"
