[![Build Status](https://secure.travis-ci.org/localgod/ConsoleColor.png?branch=master)](http://travis-ci.org/localgod/ConsoleColor)

This class is a reimplementation of http://pear.php.net/package/Console_Color/ for php 5.3 

ConsoleColor is a simple class to use ANSI Colorcodes.

ConsoleColor::convert() - Transform Colorcodes into ANSI Control Codes  
  Converts colorcodes in the format %y (for yellow) into ansi-control
  codes. The conversion table is: ('bold' meaning 'light' on some
  terminals). It's almost the same conversion table irssi uses.
  
                 text      text            background
     ------------------------------------------------
     %k %K %0    black     dark grey       black
     %r %R %1    red       bold red        red
     %g %G %2    green     bold green      green
     %y %Y %3    yellow    bold yellow     yellow
     %b %B %4    blue      bold blue       blue
     %m %M %5    magenta   bold magenta    magenta
     %p %P       magenta (think: purple)
     %c %C %6    cyan      bold cyan       cyan
     %w %W %7    white     bold white      white
     %F     Blinking, Flashing
     %U     Underline
     %8     Reverse
     %_,%9  Bold
     %n     Resets the color
     %%     A single %

  First param is the string to convert, second is an optional flag if
  colors should be used. It defaults to true, if set to false, the
  colorcodes will just be removed (And %% will be transformed into %)
  The transformed string is returned.
  
ConsoleColor::escape() - Escapes % so they don't get interpreted as color codes
  Takes a string as an argument and returns the escaped string.
  
## Examples
```php
use Console\Color;
// Let's add a little color to the world
// %n resets the color so the following stuff doesn't get messed up
print ConsoleColor::convert("%bHello World!%n\n");
// Colorless mode, in case you need to strip colorcodes off a text
print ConsoleColor::convert("%rHello World!%n\n", false);
// The uppercase version makes a colorcode bold/bright
print ConsoleColor::convert("%BHello World!%n\n");
// To print a %, you use %%
print ConsoleColor::convert("3 out of 4 people make up about %r75%% %nof the world population.\n");
// Or you can use the escape() method.
print ConsoleColor::convert("%y".Console_Color::escape('If you feel that you do everying wrong, be random, there\'s a 50% Chance of making the right decision.')."%n\n");
```
