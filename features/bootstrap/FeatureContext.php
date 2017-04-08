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
    public function iClickOnInTheElement($arg1)
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



}
