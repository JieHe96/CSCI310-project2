Feature: (Req ID: 4) View list of papers that mention that word 
					by clicking on the word in word cloud
Scenario: (Req ID: 4) User can see five columns including title, author list, 
					conference, download link, and word frequency

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
	Then I can fill in "x_input" with "3"
And I press "searchbutton"
When I click on "analysis"
Then I should see 5 columns
And I should see "title"
And I should see "author list"
And I should see "conference"
And I should see "download link"
And I should see "word frequency"
And I should see "AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks"
And I should see "Alessandro Orso"
And I should see "the 20th IEEE/ACM international Conference on Automated software engineering"