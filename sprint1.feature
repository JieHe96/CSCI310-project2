Feature: (Req ID: 1a) Initial page that allows one to input search criteria comprised of a researcher’s last name
Scenario: User can search by researchers’ last name
Given I am on “project2.html”
When I fill in “Search_Field” with “Halfond”
And I press “Search_Button”
Then I should see “William G. J. Halfond”


Feature: (Req ID: 2) User can input the desired number of papers that is going to be returned
Scenario: User can input X in a textbox on initial page
Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
Then I can fill in “Number_of_Paper” with “3”


Feature: (Req ID: 2) When a search is submitted, it should create word cloud of the top X number of papers in the ACM and IEEE digital library that match the provided criteria
Scenario: User can see the word cloud of the X # of papers after searching for certain criterias
Given I am on “project2.html”
When I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
And I should see “William G. J. Halfond”
Then I should see “Web application modeling for testing and analysis”
And I should see “Domain and value checking of web application invocation arguments”
And I should see “Optimizing energy of HTTP requests in Android applications”
And I should not see “AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks”
And I should see “Software” in “WordCloud_Div”
And I should see “Web” in the “WordCloud_DIv”


Feature: (Req ID: 4) View list of papers that mention that word by clicking on the word in word cloud
Scenario: User can click the word and view the list of papers
Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
When I press “analysis” 
Then I should see “Web application modeling for testing and analysis”
And I should see “AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks”

Scenario: (Req ID: 4) Initially papers are ranked by word frequency

Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
When I press “analysis” 
Then I should see the papers sorted by word frequency

Scenario: (Req ID: 4) User can see five columns including title, author list, conference, download link, and word frequency
Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
When I press “analysis” 
Then I should see 5 columns
And I should see “title”
And I should see “author list”
And I should see “conference”
And I should see “download link”
And I should see “word frequency”
And I should see “AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks”
And I should see “Alessandro Orso”
And I should see “the 20th IEEE/ACM international Conference on Automated software engineering”

Scenario: (Req ID: 4) User can sort the papers by title
Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
And I press “analysis” 
When I press “title”
Then I should see the papers sorted by title


Feature: (Req ID: 6a) For each paper, provide links to download it from the digital library
Scenario: User can click on the link to download the paper
Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
When I press “analysis” 
And I should see “Web application modeling for testing and analysis”
And I should see “AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks”
Then I press “Download”
	And I should download the file


Feature: (Req ID: 6b) For each paper, provide links to access its bibtex
Scenario: User can click on the link to access the paper’s bibtex
Given I am on “project2.html”
And I fill in “Search_Field” with “Halfond”
	And I fill in “Number_of_Paper” with “3”
And I press “Search_Button”
When I press “analysis” 
And I should see “Web application modeling for testing and analysis”
And I should see “AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks”
Then I press “Access”
	And I should be on “bibtex_page”
