@sprint2
Feature: (Req ID: 5) Export lists of papers as PDFs and plain text

Scenario: Export as PDF

Given I am on "/WordCloud.html"
And I fill in "search_input" with "wang"
And I fill in "x_input" with "5"
And I press "searchbutton"
And I wait for 10 seconds
And I click on "bunch"
When I check "export as PDF"
And I click on "exportButton"
Then I should see PDF downloaded

Scenario: Export as plain text

Given I am on "/WordCloud.html"
And I fill in "search_input" with "wang"
And I fill in "x_input" with "5"
And I press "searchbutton"
And I wait for 10 seconds
And I click on "bunch"
When I check "export as plain text"
And I click on "exportButton"
Then I should see plain text downloaded
