[![Build Status](https://secure.travis-ci.org/localgod/ConsoleColor.png?branch=master)](http://travis-ci.org/localgod/ConsoleColor)

This class is a reimplementation of http://pear.php.net/package/Console_Color/ for php 5.3 

ConsoleColor is a simple class to use ANSI Colorcodes.

Console_Color::convert() - Transform Colorcodes into ANSI Control Codes  
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
  
Console_Color::escape() - Escapes % so they don't get interpreted as color codes
  Takes a string as an argument and returns the escaped string.
