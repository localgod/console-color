<?php
use Localgod\Console\Color;
/**
 * Console color
 *
 * PHP version 5
 *
 * @category Console
 * @author   Johannes Skov Frandsen <localgod@heaven.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/localgod/console-color
 */

/**
 * Test class for color
 *
 * @category Console
 * @author Johannes Skov Frandsen <localgod@heaven.dk>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/localgod/console-color
 */
class ColorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test
     *
     * @test
     *
     * @return void
     */
    public function redTxt()
    {
        $this->assertEquals('[31mred[0m', Color::redNormal('red'));
    }
}
