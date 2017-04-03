Team Q Testing

White-box Testing
-------------------------------------------------------------------
1.	Open terminal, go to directory: Desktop/project2
2.	Run command line
phpunit --coverage-text=./report/whitecoverage.txt --log-junit report/whiteresult.xml --testdox-text report/whitestatus.txt phptest/whitetests.php 

3.	The coverage report is generated as ./report/directorywhitecoverage.xml
	The pass&fail status report is generated as ./report/whitestatus.txt
	The other test output is generated as  ./report/whiteresult.txt
----------------------------------------------------------------------

Black-box Testing 
---------------------------------------------------------------------- 
1.	Open terminal, change directory to: Desktop/project2  
2.	Run command line  
php bin/behat --out report/blackresult.out 
3.	The test result is generated as ./report/blackresult.out 
  