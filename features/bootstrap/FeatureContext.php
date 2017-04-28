<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//



    /**
     * @Given /^I wait for (\d+) seconds$/
     */
    public function iWaitForSeconds($arg1)
    {
        sleep($arg1);
    }

    /**
     * @Given /^I click on "([^"]*)" in the "([^"]*)" element$/
     */
    public function iClickOnInTheElement($arg1,$arg2)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find('xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', '*//*[text()="'. $arg1 .'"]')
        );
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Cannot find text: "%s"', $arg1));
        }
 
        $element->click();
    }

    /**
     * @Given /^I click on "([^"]*)"$/
     */
    public function iClickOn($arg1)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find('xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', '*//*[text()="'. $arg1 .'"]')
        );
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Cannot find text: "%s"', $arg1));
        }
 
        $element->click();
    }

    /**
     * @Given /^I wait for the word cloud to appear$/
     */
    public function iWaitForTheWordCloudToAppear()
    {
        $this->getSession()->wait(5000, "$('#wordcloudDiv').children().length > 0");
        //https://github.com/Behat/MinkExtension-example/blob/master/features/bootstrap/InheritedFeatureContext.php
        //Error - $ is not defined......
    }


    /**
     * @Then /^I should see "([^"]*)" in the table$/
     */
    public function iShouldSeeInTheTable($arg1)
    {
	$td = $this->getSession()->getPage()->find('css',
        	sprintf('table tbody tr td:contains("%s")', $arg1)
    	);
	if (null == $td) {
        	throw new PendingException();
	}
    }

    /**
     * @Then /^I should see (\d+) columns$/
     */
    public function iShouldSeeColumns($num)
    {
        $this->assertSession()->elementsCount('css', "th", intval($num));
    }

    /**
     * @When /^I click on "([^"]*)" in the headers of table$/
     */
    public function iClickOnInTheHeadersOfTable($arg1)
    {
        $td = $this->getSession()->getPage()->find('css',
        	sprintf('table thead tr th:contains("%s")', $arg1)
    	);
    	if (null == $td) {
            	throw new Exception("header not found");
    	}
    	$td -> click();
    }

    /**
     * @Given /^"([^"]*)" should precede "([^"]*)" in the (\d+) column of table$/
     */
    public function shouldPrecedeInTheColumnOfTable($arg1, $arg2, $arg3)
    {
    $session = $this->getMainContext()->getSession(); //get the page
	$element1 = $session->getPage()->find('xpath',
        	$session->getSelectorsHandler()->selectorToXpath('xpath', '//table[@id="papertable"]/tbody/tr[1]/td['.$arg3.']'));
	$elementText1 = $element1->getText();

    $session = $this->getMainContext()->getSession(); //get the page
	$element2 = $session->getPage()->find('xpath',
        	$session->getSelectorsHandler()->selectorToXpath('xpath', '//table[@id="papertable"]/tbody/tr[2]/td['.$arg3.']'));
	$elementText2 = $element2->getText();
	
	if ($elementText1 != $arg1 or $elementText2 != $arg2) {
    		throw new Exception('Value not correct');
	}
    }

    /**
     * @Then /^I click on "([^"]*)" in the table$/
     */
    public function iClickOnInTheTable($arg1)
    {
        $td = $this->getSession()->getPage()->find('css',
        	sprintf('table tbody tr td:contains("%s")', $arg1)
    	);
    	if (null == $td) {
            	throw new Exception('Element not Found');
    	}
    	else {
    		$td -> click();
    	}
    }

    /**
     * @When /^I move the mouse over "([^"]*)" element$/
     */
    public function iMoveTheMouseOverElement($arg1)
    {
        $session = $this->getSession(); // get the mink session
        $element = $session->getPage()->find('css', $arg1); // runs the actual query and returns the element
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate CSS selector: "%s"', $arg1));
        }
        $element->mouseOver();
    }

        /**
     * @Then /^I can move the mouse over "([^"]*)" element to see "([^"]*)"$/
     */
    public function iCanMoveTheMouseOverElementToSee($arg1, $arg2)
    {
        $session = $this->getSession(); // get the mink session
        $element = $session->getPage()->find('css', $arg1); // runs the actual query and returns the element
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate CSS selector: "%s"', $arg1));
        }
        $element->mouseOver();
        $e = $element->getHtml();
        if (strpos($e, $arg2) === false) {
            throw new \InvalidArgumentException(sprintf('Could not find the term '. $arg2));
        }
        // $e->click();
    }


    //     /**
    //  * @Then /^I can move the mouse over "([^"]*)" element to see "([^"]*)"$/
    //  */
    // public function iCanMoveTheMouseOverElementToSee($arg1, $arg2)
    // {
    //     $page = $this->getSession()->getPage();      
    
    //     $actual_rows = $page->findAll('css', 'div.'.$arg1.' a');
    //     if ($actual_rows === null) {
    //          throw new \InvalidArgumentException(sprintf('Could not find'. $arg1));
    //     }
    //     $actual_Values = array();
    //     foreach($actual_rows as $row) {
    //         if ($row->getText() === null)  {
    //           throw new \InvalidArgumentException(sprintf('Could not find'. $arg2));  
    //         } 
    //         else {     
    //             echo $row ;
    //         }
    //     }
       
        
    // }

    /**
     * @Then /^I can see "([^"]*)" in the "([^"]*)" element$/
     */
    public function iCanSeeInTheElement($arg1, $arg2)
    {
    	$session = $this->getSession(); 
        $element = $session->getPage()->find('css', $arg2); 
	   $element = $element-> mouseOver()->find('xpath', '//label[text()="'.$arg1.'"]');
    }

    /**
     * @Then /^I should download an image in the Download folder$/
     */
    public function iShouldDownloadAnImageInTheDownloadFolder()
    {
        if (!file_exists('/home/student/Downloads/my-image-name.jpeg')) {
        	throw new Exception('not downloaded');
    	}
    }

    /**
     * @Then /^I should see "([^"]*)" in the headers of table$/
     */
    public function iShouldSeeInTheHeadersOfTable($arg1)
    {
        $td = $this->getSession()->getPage()->find('css',
            sprintf('table thead tr th:contains("%s")', $arg1)
        );
        if (null == $td) {
                throw new Exception("header not found");
        }
    }

    /**
     * @Then /^I click on "([^"]*)" in the first row of bibtext column$/
     */
    public function iClickOnInTheFirstRowOfBibtextColumn($arg1)
    {
        $session = $this->getMainContext()->getSession(); //get the page
    
        $element1 = $session->getPage()->find('xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', '//table[@id="papertable"]/tbody/tr[1]/td[5]'));
        $elementText1 = $element1->getText();

        if ($elementText1 != $arg1 or $elementText1 === null) {
                throw new Exception('Value not correct');
        }
        $element1-> click();
    }

    /**
     * @Then /^I should see the Bibtex$/
     */
    public function iShouldSeeTheBibtex()
    {
        $windowNames = $this->getSession()->getWindowNames();
        if(count($windowNames) > 1) {
            $this->getSession()->switchToWindow($windowNames[1]);
        }    
        else {
            throw new \ErrorException("Expected to see at least 2 windows opened"); 
        }
    }



    /**
     * @Then /^I check the "([^"]*)" and "([^"]*)"$/
     */
    public function iCheckTheAnd($arg1, $arg2)
    {
        $Page = $this->getSession()->getPage();
        $isChecked = $Page->findField($arg1);
        echo $isChecked.getText();
        if ($isChecked === null) {
            throw new Exception('Value 1 not correct');
        }
        else {
            $isChecked.click();
        }

        $isChecked2 = $Page->findField($arg2);
        if ($isChecked2 === null) {
            throw new Exception('Value 2 not correct');
        }
        else {
            $isChecked2.check();
        }
    }

    /**
     * @Then /^I should see a status bar$/
     */
    public function iShouldSeeAStatusBar()
    {
        $session = $this->getSession(); // get the mink session
        $element = $session->getPage()->find('css', '#progressContainer'); // runs the actual query and returns the element
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('bar not found'));
        }
        if ($element->isVisible() === false) {
             throw new \InvalidArgumentException(sprintf('it is invisible'));
        }
    }

    /**
     * @Given /^I should word "([^"]*)" highlighted in the abstract$/
     */
    public function iShouldWordHighlightedInTheAbstract($arg1)
    {
       
        $session = $this->getSession(); // get the mink session
        $element = $session->getPage()->find('css',  '#abstractContent'); // runs the actual query and returns the element
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not find the div'));
        }
        $e = $element->getHtml();
        $highlighted = '<span class="highlight"> '.$arg1. ' </span>';
        if (strpos($e, $highlighted) === false) {
            throw new \InvalidArgumentException(sprintf('Could not find the term '. $arg1));
        }

    }

    /**
     * @Then /^I should see the paper comes from ACM library in the table$/
     */
    public function iShouldSeeThePaperComesFromAcmLibraryInTheTable()
    {
        $session = $this->getMainContext()->getSession(); //get the page
        $element = $session->getPage()->find('xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', '//table[@id="papertable"]/tbody/tr[1]/td[4]'));
        if ($element === null) {
                throw new Exception('not found the element');
        }
        $elementText = $element->getText();
        if (strpos($elementText, 'acm') === false) {
            throw new \InvalidArgumentException(sprintf('Could not find the term '. 'acm'));
        }

        
    }





}
