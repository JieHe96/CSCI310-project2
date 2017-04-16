@sprint2
Feature: (Req ID: 4) View list of papers that mention that word 
					by clicking on the word in word cloud
Scenario: (Req ID: 4) User can see five columns including title, author list, 
					conference, download link, and word frequency

Given I am on "/WordCloud.html"
When I fill in "search_input" with "wang"
And I fill in "x_input" with "5"
And I press "searchbutton"
And I wait for 10 seconds
Then I should see "bunch"
When I click on "bunch"
Then I should see 5 columns