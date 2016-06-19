<?php
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Localgod\Console\Color;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Console output
     * @var string
     */
    private $output;
    
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     */
    public function __construct()
    {
        // Initialize your context here
    }

    /**
     * @Given /^I can access Color$/
     */
    public function iCanAccessColor()
    {
        Color::convert('');
    }

    /**
     * @When /^I call the convert method with the red argument$/
     */
    public function iCallTheConvertMethodWithTheRedArgument()
    {
        $this->output = Color::redNormal('red');
    }

    /**
     * @Then /^I should get a string in a red font$/
     */
    public function iShouldGetAStringInARedFont()
    {
        if (! preg_match('/\[31mred\[0m/', $this->output)) {
            throw new \Exception("Actual output is:\n" . $this->output);
        }
    }
}
