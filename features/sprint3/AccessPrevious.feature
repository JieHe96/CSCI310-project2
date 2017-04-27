@sprint3
Feature: (Req ID: 3) Access previously entered searches
Scenario: User can search by clicking on previously searched terms

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
Then I fill in "search_input" with "wang"
And I press "searchbutton"
Then I can move the mouse over ".dropdown-content" element to see "steven"
