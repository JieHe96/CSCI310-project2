@sprint3
Feature: (Req ID: 7b) For each paper, clicking on a paper’s title 
		will allow the user access for downloading a PDF version of 
		the paper with the word highlighted in the PDF
Scenario: User can download the abstract as a pdf

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 25 seconds
Then I click on "crowd"
And I click on "Improving Crowd Innovation with Expert Facilitation"
And I press "export abstract"