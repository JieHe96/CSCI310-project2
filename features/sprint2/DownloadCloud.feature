@sprint2
Feature: (Req ID: 10) Allow for the downloading of an image of the generated word cloud

Scenario: User should be able to download the image of the cloud to the local default  repository

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 30 seconds
Then I press "button_downloadimage"
Then I should download an image in the Download folder
