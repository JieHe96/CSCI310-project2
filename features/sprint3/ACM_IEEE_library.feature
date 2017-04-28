@sprint3
Feature: (ID: 2) ACM/IEEE libraries should be used

Scenario: User can search for ACM/IEEE papers

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 25 seconds
Then I click on "crowd"
Then I should see the paper comes from ACM library in the table