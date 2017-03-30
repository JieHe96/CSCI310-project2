Feature: (Req ID: 4) View list of papers that mention that word by clicking on 
		the word in word cloud
Scenario: User can click the word and view the list of papers

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
	Then I can fill in "x_input" with "3"
And I press "searchbutton"
When I click on "analysis"
Then I should see "Web application modeling for testing and analysis"
And I should see "AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks"