<?php
/**
 * Console color
 *
 * PHP version 8
 *
 * @category Console
 * @author   Johannes Skov Frandsen <jsf@greenoak.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/localgod/console-color
 */
use Localgod\Console\Color;
/**
 * Test class for color
 *
 * @category Console
 * @author Johannes Skov Frandsen <jsf@greenoak.dk>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/localgod/console-color
 */
class ColorTest extends PHPUnit\Framework\TestCase
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
        file_put_contents('background', Color::redBackground('red'));
        $this->assertEquals('[41mred[0m', Color::redBackground('red'));
        unlink('background');
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
        file_put_contents('bright', Color::redBright('red'));
        $this->assertEquals('[31;1mred[0m', Color::redBright('red'));
        unlink('bright');
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
