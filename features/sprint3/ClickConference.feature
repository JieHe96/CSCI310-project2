@sprint3
Feature: (Req ID: 12) For each paper, clicking on a paper’s conference name will list other papers from that conference

Scenario: User can click on a paper's conference name, and user will see a list of papers from that conference

Given I am on "/WordCloud.html"
And I fill in "search_input" with "wang"
And I press "searchbutton"
And I wait for 20 seconds
And I click on "system"
When I click on "MOD" in the table
Then I should see "Twitter Heron: Stream Processing at Scale"
