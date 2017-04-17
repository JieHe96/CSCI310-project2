@sprint2
Feature: (Req ID: 4) View list of papers that mention that word 
					by clicking on the word in word cloud
Scenario: (Req ID: 4) User can see five columns including title, author list, 
					conference, download link, and word frequency

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 30 seconds
And I click on "with"
Then I should see "Title" in the headers of table
And I should see "Authors" in the headers of table
And I should see "Conference" in the headers of table
And I should see "Download" in the headers of table
And I should see "Frequency" in the headers of table
