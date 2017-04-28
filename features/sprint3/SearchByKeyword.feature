@sprint3
Feature: (Req ID: 1b) Initial page that allows one to input search criteria comprised of either a researcher’s last name or keyword phrase
Scenario: User can search by keyword

Given I am on "/WordCloud.html"
When I fill in "search_input" with "SQL injection"
And I press "searchbutton"
And I wait for 20 seconds
Then I should see "SQL"
