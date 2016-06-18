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
        $this->assertEquals(md5('[41mred[0m'), md5(Color::redBackground('red')));
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
        $this->assertEquals('[31;1;1mred[0m', Color::redBright('red'));
    }
}
