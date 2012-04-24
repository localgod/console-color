<?php
/**
 * ConsoleColor.php
 * 
 * PHP version 5
 *
 * Copyright (c) 2012 Johannes Skov Frandsen
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 *
 * @category Console
 * @package  ConsoleColor
 * @author   Johannes Skov Frandsen <localgod@heaven.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/localgod/ConsoleColor
 */

/**
 * A simple class to use ANSI Colorcodes.
 *
 * Of all the functions, you probably only want to use convert() and escape().
 * They are easier to use. However, if you want to access colorcodes more
 * directly, look into the other functions.
 *
 * @category Console
 * @package  ConsoleColor
 * @author   Johannes Skov Frandsen <localgod@heaven.dk>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/localgod/ConsoleColor
 */
class ConsoleColor {
	/**
	 * Color Codes
	 * @var array
	 */
	private static $_colorCodes = array(
			'color' => array(
					'black'  => 30,
					'red'    => 31,
					'green'  => 32,
					'brown'  => 33,
					'blue'   => 34,
					'purple' => 35,
					'cyan'   => 36,
					'grey'   => 37,
					'yellow' => 33
			),
			'style' => array(
					'normal'     => 0,
					'bold'       => 1,
					'light'      => 1,
					'underscore' => 4,
					'underline'  => 4,
					'blink'      => 5,
					'inverse'    => 6,
					'hidden'     => 8,
					'concealed'  => 8
			),
			'background' => array(
					'black'  => 40,
					'red'    => 41,
					'green'  => 42,
					'brown'  => 43,
					'yellow' => 43,
					'blue'   => 44,
					'purple' => 45,
					'cyan'   => 46,
					'grey'   => 47
			)
	);
	
	/**
	 * Conversion table
	 * @var array
	 */
	private static $_conversions = array (
			'%y' => array('color' => 'yellow'),
			'%g' => array('color' => 'green' ),
			'%b' => array('color' => 'blue'  ),
			'%r' => array('color' => 'red'   ),
			'%p' => array('color' => 'purple'),
			'%m' => array('color' => 'purple'),
			'%c' => array('color' => 'cyan'  ),
			'%w' => array('color' => 'grey'  ),
			'%k' => array('color' => 'black' ),
			'%n' => array('color' => 'reset' ),
			'%Y' => array('color' => 'yellow',  'style' => 'light'),
			'%G' => array('color' => 'green',   'style' => 'light'),
			'%B' => array('color' => 'blue',    'style' => 'light'),
			'%R' => array('color' => 'red',     'style' => 'light'),
			'%P' => array('color' => 'purple',  'style' => 'light'),
			'%M' => array('color' => 'purple',  'style' => 'light'),
			'%C' => array('color' => 'cyan',    'style' => 'light'),
			'%W' => array('color' => 'grey',    'style' => 'light'),
			'%K' => array('color' => 'black',   'style' => 'light'),
			'%N' => array('color' => 'reset',   'style' => 'light'),
			'%3' => array('background' => 'yellow'),
			'%2' => array('background' => 'green' ),
			'%4' => array('background' => 'blue'  ),
			'%1' => array('background' => 'red'   ),
			'%5' => array('background' => 'purple'),
			'%6' => array('background' => 'cyan'  ),
			'%7' => array('background' => 'grey'  ),
			'%0' => array('background' => 'black' ),
			'%F' => array('style' => 'blink'),
			'%U' => array('style' => 'underline'),
			'%8' => array('style' => 'inverse'),
			'%9' => array('style' => 'bold'),
			'%_' => array('style' => 'bold')
	);

	/**
	 * Returns an ANSI-Controlcode
	 *
	 * Takes 1 to 3 Arguments: either 1 to 3 strings containing the name of the
	 * FG Color, style and BG color, or one array with the indices color, style
	 * or background.
	 *
	 * @param mixed  $color      Optional.
	 *                           Either a string with the name of the foreground
	 *                           color, or an array with the indices 'color',
	 *                           'style', 'background' and corresponding names as
	 *                           values.
	 * @param string $style      Optional name of the style
	 * @param string $background Optional name of the background color
	 *
	 * @return string
	 */
	private static function _color($color = null, $style = null, $background = null) {
		if (is_array($color)) {
			$style      = isset($color['style']) ? $color['style'] : null;
			$background = isset($color['background']) ? $color['background'] : null;
			$color      = isset($color['color']) ? $color['color'] : null;
		}

		if ($color == 'reset') {
			return "\033[0m";
		}

		$code = array();
		if (isset($color)) {
			$code[] = self::$_colorCodes['color'][$color];
		}

		if (isset($style)) {
			$code[] = self::$_colorCodes['style'][$style];
			$code[] = self::$_colorCodes['style'][$style];
		}

		if (isset($background)) {
			$code[] = self::$_colorCodes['background'][$background];
		}

		if (empty($code)) {
			$code[] = 0;
		}

		$code = implode(';', $code);
		return "\033[{$code}m";
	}

	/**
	 * Converts colorcodes in the format %y (for yellow) into ansi-control
	 * codes. The conversion table is: ('bold' meaning 'light' on some
	 * terminals). It's almost the same conversion table irssi uses.
	 * <pre>
	 *                  text      text            background
	 *      ------------------------------------------------
	 *      %k %K %0    black     dark grey       black
	 *      %r %R %1    red       bold red        red
	 *      %g %G %2    green     bold green      green
	 *      %y %Y %3    yellow    bold yellow     yellow
	 *      %b %B %4    blue      bold blue       blue
	 *      %m %M %5    magenta   bold magenta    magenta
	 *      %p %P       magenta (think: purple)
	 *      %c %C %6    cyan      bold cyan       cyan
	 *      %w %W %7    white     bold white      white
	 *
	 *      %F     Blinking, Flashing
	 *      %U     Underline
	 *      %8     Reverse
	 *      %_,%9  Bold
	 *
	 *      %n     Resets the color
	 *      %%     A single %
	 * </pre>
	 * First param is the string to convert, second is an optional flag if
	 * colors should be used. It defaults to true, if set to false, the
	 * colorcodes will just be removed (And %% will be transformed into %)
	 *
	 * @param string $string  String to convert
	 * @param bool   $colored Should the string be colored?
	 *
	 * @return string
	 */
	public static function convert($string, $colored = true) {
		if ($colored) {
			$string = str_replace('%%', '% ', $string);
			foreach (self::$_conversions as $key => $value) {
				$string = str_replace($key, self::_color($value), $string);
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
	 * @param string $string String to escape
	 *
	 * @return string
	 */
	public static function escape($string) {
		return str_replace('%', '%%', $string);
	}
}
