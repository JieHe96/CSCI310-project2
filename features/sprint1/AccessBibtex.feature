Feature: (Req ID: 6b) For each paper, provide links to access its bibtex
Scenario: User can click on the link to access the paper’s bibtex

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "Halfond"
	Then I can fill in "x_input" with "3"
And I press "searchbutton"
When I click on "analysis"
And I should see "Web application modeling for testing and analysis”"
And I should see "AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks"
Then I press "Access"
	And I should be on "bibtex_page"