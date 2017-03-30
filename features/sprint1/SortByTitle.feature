Feature: (Req ID: 4) View list of papers that mention that word 
					by clicking on the word in word cloud
Scenario: (Req ID: 4) User can sort the papers by title

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
	Then I can fill in "x_input" with "3"
And I press "searchbutton"
When I click on "analysis"
When I press “title”
Then I should see the papers sorted by title