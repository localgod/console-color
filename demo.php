<?php
/**
 * Console color demo
 *
 * PHP version >=5.3
 *
 * @category Console
 * @author   Johannes Skov Frandsen <localgod@heaven.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/localgod/console-color
 */
require_once 'vendor/autoload.php';
use Localgod\Console\Color;
echo "Normal Black      : " . Color::blackNormal('Normal Black') . "\n";
echo "Normal Red        : " . Color::redNormal('Normal Red') . "\n";
echo "Normal Green      : " . Color::greenNormal('Normal Green') . "\n";
echo "Normal Blue       : " . Color::blueNormal('Normal Blue') . "\n";
echo "Normal Magenta    : " . Color::magentaNormal('Normal Magenta') . "\n";
echo "Normal Cyan       : " . Color::cyanNormal('Normal Cyan') . "\n";
echo "Normal Grey       : " . Color::whiteNormal('Normal White') . "\n";
echo "Normal Yellow     : " . Color::yellowNormal('Normal Yellow') . "\n";
echo "\n";
echo "Bright Black      : " . Color::blackBright('Bright Black') . "\n";
echo "Bright Red        : " . Color::redBright('Bright Red') . "\n";
echo "Bright Green      : " . Color::greenBright('Bright Green') . "\n";
echo "Bright Blue       : " . Color::blueBright('Bright Blue') . "\n";
echo "Bright Magenta    : " . Color::magentaBright('Bright Magenta') . "\n";
echo "Bright Cyan       : " . Color::cyanBright('Bright Cyan') . "\n";
echo "Bright White      : " . Color::whiteBright('Bright White') . "\n";
echo "Bright Yellow     : " . Color::yellowBright('Bright Yellow') . "\n";
echo "\n";
echo "Background Black  : " . Color::blackBackground('Black Background') . "\n";
echo "Background Red    : " . Color::redBackground('Red Background') . "\n";
echo "Background Green  : " . Color::greenBackground('Green Background') . "\n";
echo "Background Blue   : " . Color::blueBackground('Blue Background') . "\n";
echo "Background Magenta: " . Color::magentaBackground('Magenta Background') . "\n";
echo "Background Cyan   : " . Color::cyanBackground('Cyan Background') . "\n";
echo "Background White  : " . Color::whiteBackground('White Background') . "\n";
echo "Background Yellow : " . Color::yellowBackground('Yellow Background') . "\n";
echo "\n";
echo Color::convert("%6%b %7%k                %KC%n%7%kombo               %6%b %n") . "\n";
echo "\n";
echo Color::cyanNormal("Demo is now " . Color::escape('100%') . " done") . "\n";
echo "\n";