Feature: (Req ID: 6a) For each paper, provide links to download it from the digital library
Scenario: User can click on the link to download the paper

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
	Then I can fill in "x_input" with "3"
And I press "searchbutton"
When I click on "analysis"
And I should see "Web application modeling for testing and analysis”"
And I should see "AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks"
Then I press "Download"
	And I should download the file