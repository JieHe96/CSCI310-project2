@sprint2
Feature: (Req ID: 4) View list of papers that mention that word by clicking on 
		the word in word cloud
Scenario: Initially papers are ranked by frequency.

Given I am on "/WordCloud.html"
	And I fill in "search_input" with "steven"
	And I press "searchbutton"
	And I wait for 30 seconds
And I click on "with"
And "Methodological Triangulation Using Neural Networks for Business Research" should precede "Ablative Therapies for Colorectal Polyps and Malignancy"
