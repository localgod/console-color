<?php

/**
 * Console color
 *
 * PHP version >=8
 *
 * @category Console
 * @author   Johannes Skov Frandsen <jsf@greenoak.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/localgod/console-color
 */

namespace Localgod\Console;

/**
 * A simple class to use ANSI Colorcodes.
 *
 * ::convert() and ::escape() are your base tools.
 * ::*Normal(), *Bright() and *Background() can be use as convenient shorthands eg. ::redNormal()
 *
 * @category Console
 * @author Johannes Skov Frandsen <jsf@greenoak.dk>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/localgod/console-color
 *
 * @method static string blackNormal(string $string) Encode the string as black
 * @method static string redNormal(string $string) Encode the string as red
 * @method static string greenNormal(string $string) Encode the string as green
 * @method static string blueNormal(string $string) Encode the string as blue
 * @method static string magentaNormal(string $string) Encode the string as magenta
 * @method static string cyanNormal(string $string) Encode the string as cyan
 * @method static string whiteNormal(string $string) Encode the string as white
 * @method static string yellowNormal(string $string) Encode the string as yellow
 *
 * @method static string blackBright(string $string) Encode the string as bright black
 * @method static string redBright(string $string) Encode the string as bright red
 * @method static string greenBright(string $string) Encode the string as bright green
 * @method static string blueBright(string $string) Encode the string as bright blue
 * @method static string magentaBright(string $string) Encode the string as bright magenta
 * @method static string cyanBright(string $string) Encode the string as bright cyan
 * @method static string whiteBright(string $string) Encode the string as bright white
 * @method static string yellowBright(string $string) Encode the string as bright yellow
 *
 * @method static string blackBackground(string $string) Encode the string with black background
 * @method static string redBackground(string $string) Encode the string with red background
 * @method static string greenBackground(string $string) Encode the string with green background
 * @method static string blueBackground(string $string) Encode the string with blue background
 * @method static string magentaBackground(string $string) Encode the string with magenta background
 * @method static string cyanBackground(string $string) Encode the string with cyan background
 * @method static string whiteBackground(string $string) Encode the string with white background
 * @method static string yellowBackground(string $string) Encode the string with yellow background
 */
class Color
{
    /**
     * Color Codes
     *
     * @var array
     */
    private static array $colorCodes = array(
        'color' => array(
            'black' => 30,
            'red' => 31,
            'green' => 32,
            'blue' => 34,
            'magenta' => 35,
            'cyan' => 36,
            'white' => 37,
            'yellow' => 33
        ),
        'style' => array(
            'normal' => 0,
            'bold' => 1,
            'light' => 1,
            'underscore' => 4,
            'underline' => 4,
            'blink' => 5,
            'inverse' => 6,
            'hidden' => 8,
            'concealed' => 8
        ),
        'background' => array(
            'black' => 40,
            'red' => 41,
            'green' => 42,
            'yellow' => 43,
            'blue' => 44,
            'magenta' => 45,
            'cyan' => 46,
            'white' => 47
        )
    );

    /**
     * Conversion table
     *
     * @var array
     */
    private static array $conversions = array(
        '%y' => array(
            'color' => 'yellow'
        ),
        '%g' => array(
            'color' => 'green'
        ),
        '%b' => array(
            'color' => 'blue'
        ),
        '%r' => array(
            'color' => 'red'
        ),
        '%m' => array(
            'color' => 'magenta'
        ),
        '%c' => array(
            'color' => 'cyan'
        ),
        '%w' => array(
            'color' => 'white'
        ),
        '%k' => array(
            'color' => 'black'
        ),
        '%n' => array(
            'color' => 'reset'
        ),
        '%Y' => array(
            'color' => 'yellow',
            'style' => 'light'
        ),
        '%G' => array(
            'color' => 'green',
            'style' => 'light'
        ),
        '%B' => array(
            'color' => 'blue',
            'style' => 'light'
        ),
        '%R' => array(
            'color' => 'red',
            'style' => 'light'
        ),
        '%M' => array(
            'color' => 'magenta',
            'style' => 'light'
        ),
        '%C' => array(
            'color' => 'cyan',
            'style' => 'light'
        ),
        '%W' => array(
            'color' => 'white',
            'style' => 'light'
        ),
        '%K' => array(
            'color' => 'black',
            'style' => 'light'
        ),
        '%N' => array(
            'color' => 'reset',
            'style' => 'light'
        ),
        '%3' => array(
            'background' => 'yellow'
        ),
        '%2' => array(
            'background' => 'green'
        ),
        '%4' => array(
            'background' => 'blue'
        ),
        '%1' => array(
            'background' => 'red'
        ),
        '%5' => array(
            'background' => 'magenta'
        ),
        '%6' => array(
            'background' => 'cyan'
        ),
        '%7' => array(
            'background' => 'white'
        ),
        '%0' => array(
            'background' => 'black'
        ),
        '%F' => array(
            'style' => 'blink'
        ),
        '%U' => array(
            'style' => 'underline'
        ),
        '%8' => array(
            'style' => 'inverse'
        ),
        '%9' => array(
            'style' => 'bold'
        ),
        '%_' => array(
            'style' => 'bold'
        )
    );

    /**
     * Conversion table reverse lookup
     *
     * @var array
     */
    private static array $reverseLookup = array(
        'normal' => array(
            'black' => '%k',
            'red' => '%r',
            'green' => '%g',
            'yellow' => '%y',
            'blue' => '%b',
            'magenta' => '%M',
            'cyan' => '%c',
            'white' => '%w'
        ),
        'bright' => array(
            'black' => '%K',
            'red' => '%R',
            'green' => '%G',
            'yellow' => '%Y',
            'blue' => '%B',
            'magenta' => '%M',
            'cyan' => '%C',
            'white' => '%W'
        ),
        'background' => array(
            'black' => '%0',
            'red' => '%1',
            'green' => '%2',
            'yellow' => '%3',
            'blue' => '%4',
            'magenta' => '%5',
            'cyan' => '%6',
            'white' => '%7'
        )
    );

    /**
     * Call method by name
     *
     * @param string $name
     *            Name of method to call
     * @param array $arguments
     *            Arguments to method
     *
     * @return string
     */
    public static function __callStatic(string $name, array $arguments): string
    {
        $types = implode('|', array_map('ucfirst', array_keys(self::$reverseLookup)));
        $colors = implode('|', array_keys(self::$reverseLookup['normal']));

        $matches = array();
        if (preg_match('/^(' . $colors . ')(' . $types . ')$/', $name, $matches)) {
            $color = $matches[1];
            $type = strtolower($matches[2]);
            return static::convert(self::$reverseLookup[$type][$color] . $arguments[0] . "%n");
        }
        return $arguments[0];
    }

    /**
     * Returns an ANSI-Controlcode
     *
     * Takes 1 to 3 Arguments: either 1 to 3 strings containing the name of the
     * FG Color, style and BG color, or one array with the indices color, style
     * or background.
     *
     * @param mixed $color
     *            Optional.
     *            Either a string with the name of the foreground
     *            color, or an array with the indices 'color',
     *            'style', 'background' and corresponding names as
     *            values.
     * @param string $style
     *            Optional name of the style
     * @param string $background
     *            Optional name of the background color
     *
     * @return string
     */
    private static function ansi(mixed $color = null, string|null $style = null, string|null $background = null): string
    {
        if (is_array($color)) {
            $style = isset($color['style']) ? $color['style'] : null;
            $background = isset($color['background']) ? $color['background'] : null;
            $color = isset($color['color']) ? $color['color'] : null;
        }

        if ($color == 'reset') {
            return "\033[0m";
        }

        $code = array();

        if (isset($color)) {
            $code[] = self::$colorCodes['color'][$color];
        }

        if (isset($style)) {
            $code[] = self::$colorCodes['style'][$style];
        }

        if (isset($background)) {
            $code[] = self::$colorCodes['background'][$background];
        }

        if (empty($code)) {
            $code[] = 0;
        }

        $code = implode(';', $code);
        return "\033[{$code}m";
    }

    /**
     * Converts colorcodes in the format %y (for yellow) into ansi-control
     * codes.
     * The conversion table is: ('bold' meaning 'light' on some
     * terminals). It's almost the same conversion table irssi uses.
     * <pre>
     * text text background
     * ------------------------------------------------
     * %k %K %0 black dark white black
     * %r %R %1 red bold red red
     * %g %G %2 green bold green green
     * %y %Y %3 yellow bold yellow yellow
     * %b %B %4 blue bold blue blue
     * %m %M %5 magenta bold magenta magenta
     * %c %C %6 cyan bold cyan cyan
     * %w %W %7 white bold white white
     *
     * %F Blinking, Flashing
     * %U Underline
     * %8 Reverse
     * %_,%9 Bold
     *
     * %n Resets the color
     * %% A single %
     * </pre>
     * First param is the string to convert, second is an optional flag if
     * colors should be used. It defaults to true, if set to false, the
     * colorcodes will just be removed (And %% will be transformed into %)
     *
     * @param string $string
     *            String to convert
     * @param bool $colored
     *            Should the string be colored?
     *
     * @return string
     */
    public static function convert(string $string, bool $colored = true): string
    {
        if ($colored) {
            $string = str_replace('%%', '% ', $string);
            foreach (self::$conversions as $key => $value) {
                $string = str_replace($key, self::ansi($value), $string);
            }
            $string = str_replace('% ', '%', $string);
        } else {
            $string = preg_replace('/%((%)|.)/', '$2', $string);
        }

        return $string;
    }

    /**
     * Escapes % so they don't get interpreted as color codes
     *
     * @param string $string
     *            String to escape
     *
     * @return string
     */
    public static function escape(string $string): string
    {
        return str_replace('%', '%%', $string);
    }
}
