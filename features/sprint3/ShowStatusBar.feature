@sprint3
Feature: (Req ID: 8) Show a status bar for current 
		progress in generating the word cloud

Scenario: User can see a status bar after searching

Given I am on "/WordCloud.html"
And I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 5 seconds
Then I should see a status bar