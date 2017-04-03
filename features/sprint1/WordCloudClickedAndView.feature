@sprint1
Feature: (Req ID: 4) View list of papers that mention that word by clicking on 
		the word in word cloud
Scenario: User can click the word and view the list of papers

Given I am on "/WordCloud.html"
	And I fill in "search_input" with "wang"
	And I fill in "x_input" with "5"
	And I press "searchbutton"
	And I wait for 20 seconds
When I click on "beam"
Then I should see "Longitudinal Single Bunch Instability Study on BEPCII"