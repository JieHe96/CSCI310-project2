@sprint2
Feature: (Req ID: 4) View list of papers that mention that word 
					by clicking on the word in word cloud
Scenario: (Req ID: 4) User can sort the table by clicking on the headers

Given I am on "/WordCloud.html"
When I fill in "search_input" with "steven"
And I press "searchbutton"
And I wait for 30 seconds
And I click on "with"

When I click on "Title" in the headers of table
And "Ablative Therapies for Colorectal Polyps and Malignancy" should precede "An Alternative Paradigm for the Role of Antimalarial Plants in Africa" in the 1 column of table

When I click on "Authors" in the headers of table
And "Jacqueline Oxenberg Steven N. Hochwald Steven Nurkin" should precede "Steven Jerie" in the 2 column of table

When I click on "Download" in the headers of table
And "http://downloads.hindawi.com/archive/2014/865854.pdf" should precede "http://downloads.hindawi.com/journals/aans/2012/517234.pdf" in the 4 column of table

When I click on "Frequency" in the headers of table
And "68" should precede "62" in the 6 column of table
