@sprint1
Feature: (Req ID: 1a) Initial page that allows one to input 
		  search criteria comprised of a researcher’s last name
Scenario: User can search by researchers’ last name

Given I am on "http://localhost/project2/WordCloud.html"
When I fill in "search_input" with "wang"
And I press "searchbutton"
And I wait for 15 seconds
Then I should see "bunch"