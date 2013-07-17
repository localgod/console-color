[![Build Status](https://secure.travis-ci.org/localgod/ConsoleColor.png?branch=master)](http://travis-ci.org/localgod/ConsoleColor)

This projects is a reimplementation of the ideas used in http://pear.php.net/package/Console_Color/

ConsoleColor makes it simple to work with ANSI Color codes in you console programs.

## Base methods
**\Console\Color::escape()**
Escapes % so they don't get interpreted as color codes

Takes a string as an argument and returns the escaped string.


**\Console\Color::convert()**
Transform Colorcodes into ANSI Control Codes  

Converts colorcodes in the format %y (for yellow) into ansi-control codes.

First param is the string to convert, second is an optional flag if
colors should be used. 

It defaults to true, if set to false, the
colorcodes will just be removed (And %% will be transformed into %)

The transformed string is returned.

## Code conversion table

<table>
	<thead>
		<tr>
			<th></th>
			<th>Normal</th>
			<th>Bright</th>
			<th>Background</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Black</th>
			<td>%k</td>
			<td>%K</td>
			<td>%0</td>
		</tr>
		<tr>
			<th>Red</th>
			<td>%r</td>
			<td>%R</td>
			<td>%1</td>
		</tr>
		<tr>
			<th>Green</th>
			<td>%g</td>
			<td>%G</td>
			<td>%2</td>
		</tr>
		<tr>
			<th>Yellow</th>
			<td>%y</td>
			<td>%Y</td>
			<td>%3</td>
		</tr>
		<tr>
			<th>Blue</th>
			<td>%b</td>
			<td>%B</td>
			<td>%4</td>
		</tr>
		<tr>
			<th>Magenta</th>
			<td>%m</td>
			<td>%M</td>
			<td>%5</td>
		</tr>
		<tr>
			<th>Cyan</th>
			<td>%c</td>
			<td>%C</td>
			<td>%6</td>
		</tr>
		<tr>
			<th>White</th>
			<td>%w</td>
			<td>%W</td>
			<td>%7</td>
		</tr>
	</tbody>
</table>

| Code  | Effect             |
| ----- |:------------------:| 
| %F    | Blinking, Flashing |
| %U    | Underline          |
| %8    | Reverse            |
| %_,%9 | Bold               |
| %n    | Resets the color   |
| %%    | A single %         |

## Examples
```php
use Console\Color;
// Let's add a little color to the world
// %n resets the color so the following stuff doesn't get messed up
print Color::convert("%bHello World!%n\n");
// Colorless mode, in case you need to strip colorcodes off a text
print Color::convert("%rHello World!%n\n", false);
// The uppercase version makes a colorcode bold/bright
print Color::convert("%BHello World!%n\n");
// To print a %, you use %%
print Color::convert("3 out of 4 people make up about %r75%% %nof the world population.\n");
// Or you can use the escape() method.
print Color::convert("%y".Color::escape('If you feel that you do everying wrong, be random, there\'s a 50% Chance of making the right decision.')."%n\n");
```
