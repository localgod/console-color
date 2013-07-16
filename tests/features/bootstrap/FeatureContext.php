<?php
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Console\Color;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters
     *            context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
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
        $this->output = Color::convert('%rred%n');
    }

    /**
     * @Then /^I should get a string in a red font$/
     */
    public function iShouldGetAStringInARedFont()
    {
        if (! preg_match('/\[31mred\[0m/', $this->output)) {
            throw new Exception("Actual output is:\n" . $this->output);
        }
    }
}
