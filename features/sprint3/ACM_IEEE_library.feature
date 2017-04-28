@sprint3
Feature: ACM/IEEE libraries should be used

Scenario: User can search for ACM papers

Given I am on "/WordCloud.html"
When I fill in "search_input" with "halfond"
And I press "searchbutton"
And I wait for 20 seconds
Then I should see "application"
When I click on "application"
Then I should see "Web application modeling for testing and analysis"

Scenario: User can search for IEEE papers

Given I am on "/WordCloud.html"
When I fill in "search_input" with "puvvada"
And I press "searchbutton"
And I wait for 20 seconds
Then I should see "multipliers"
When I click on "multipliers"
Then I should see "Low complexity architecture of linear periodically time varying filter based on a switching representation"

