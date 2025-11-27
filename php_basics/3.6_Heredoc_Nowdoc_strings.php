<?php

// when placing variables in doouble quote strings, if there is any double quote ", they need to be escaped
// using a backslash

$he = 'Bob';
$she = 'Alice';

$text = "$he said, \"PHP is awesome\". \"Of course.\" $she agreed.";

echo $text;

// php heredoc strings behave like double quote strings
// the name of the identifier is up to us (can be anything as long as it follows variable naming rules)
// and can include single quote and variables as well
$he = 'Bob';
$she = 'Alice';

$text = <<<TEXT
$he said "PHP is awesome". "Of course" $she agreed." 
TEXT;

echo $text;

// heredoc can be used to generate HTML dynamically
$header = <<<HEADER
<header>
    <h1>$title</h1>
</header>
HEADER;

echo $header;

// And here is the Nowdoc syntax
$str = <<<'IDENTIFIER'
place a string here
it can span multiple lines
and include single quote ' and double quotes "
IDENTIFIER;
// the first identifier must be enclosed in single quotes

// SUMMARY
// Heredoc strings are like double-quoted strings without escaping.
// Nowdoc strings are like single-quoted strings without escaping.