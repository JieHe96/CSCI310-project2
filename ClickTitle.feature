@sprint2
Feature: (Req ID: 7a) For each paper, clicking on a paper's title will allow the user to read the abstract with the word highlighted

Scenario: When I click on a paper's title, I should be able to see the abstract with the word highlighted

Given I am on "/WordCloud.html"
And I fill in "search_input" with "wang"
And I fill in "x_input" with "5"
And I press "searchbutton"
And I wait for 10 seconds
And I click on "bunch"
When I click on "Longitudinal Single Bunch Instability Study on BEPCII"
Then I should see "Abstract"
And I should see "the longitudinal loss factor for the bunch are obtained"
