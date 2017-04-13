@sprint2
Feature: (Req ID: 12) For each paper, clicking on a paper's conference name will list other papers from that conference

Scenario: As a user, when I click on a paper's conference name, I should be able to see other papers from that conference

Given I am on "/WordCloud.html"
And I fill in "search_input" with "wang"
And I fill in "x_input" with "5"
And I press "searchbutton"
And I wait for 10 seconds
Then I should see "bunch"
When I click on "bunch"
And I click on "[ACM conference]"
Then I should see "[other papers from ACM conference]"
