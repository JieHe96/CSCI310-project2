Feature: (Req ID: 4) View list of papers that mention that word by clicking on the word in word cloud
Scenario: (Req ID: 4) Initially papers are ranked by word frequency

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
	Then I can fill in "x_input" with "3"
And I press "searchbutton"
When I click on "analysis"
Then I should see the papers sorted by word frequency