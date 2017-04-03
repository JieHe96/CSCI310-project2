Feature: (Req ID: 2) When a search is submitted, it should create word cloud of the 
		  top X number of papers in the ACM and IEEE digital library that match 
		  the provided criteria

Scenario: User can see the word cloud of the top 5 of papers after searching 
		for research with last name "wang"

Given I am on "http://localhost/project2/WordCloud.html"
	And I fill in "search_input" with "wang"
When I fill in "x_input" with "5"
	And I press "searchbutton"
	And I wait for 10 seconds
Then I should see "beam"
	And I should see "factor"


#Then I should see "Web application modeling for testing and analysis"
#	And I should see "Domain and value checking of web application invocation arguments"
#	And I should see "Optimizing energy of HTTP requests in Android applications"
#	And I should not see "AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks"
#	And I should see "Software" in "wordcloudDiv"
#	And I should see "Web" in "wordcloudDiv"