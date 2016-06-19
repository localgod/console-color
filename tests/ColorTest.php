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
     * Test normal
     *
     * @test
     *
     * @return void
     */
    public function normal()
    {
        $this->assertEquals('[31mred[0m', Color::redNormal('red'));
    }
    
    /**
     * Test background
     *
     * @test
     *
     * @return void
     */
    public function background()
    {
        $this->assertEquals('[41mred[0m', Color::redBackground('red'));
    }
    
    /**
     * Test bright
     *
     * @test
     *
     * @return void
     */
    public function bright()
    {
        $this->assertEquals('[31;1mred[0m', Color::redBright('red'));
    }
    
    /**
     * Test escape
     *
     * @test
     *
     * @return void
     */
    public function escape()
    {
        $this->assertEquals('[41m20%[0m', Color::convert('%1'.Color::escape('20%').'%n'));
    }
}
