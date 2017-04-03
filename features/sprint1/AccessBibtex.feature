Feature: (Req ID: 6b) For each paper, provide links to access its bibtex
Scenario: User can click on the link to access the paper’s bibtex

Given I am on "/WordCloud.html"
	And I fill in "search_input" with "wang"
	And I press "searchbutton"
	And I wait for 30 seconds
Then I should see "we"
	And I click on "we" in the "div#wordcloudDiv" element
	Then I should see "http://arxiv.org/pdf/1304.2822v1" in the table
