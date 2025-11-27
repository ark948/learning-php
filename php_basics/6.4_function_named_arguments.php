<?php

// Since PHP 8.0, you can use named arguments for functions. 
// The named arguments allow you to pass arguments to a function based on the parameter names rather than the parameter positions.


function find($needle, $haystack)
{
    // Find the numeric position of the first occurrence of needle in the haystack string.
    return strpos($haystack, $needle);
}    


echo find (
    needle : 'awesome',
    haystack : 'PHP is awesome!'
);

// since we are using named arguments, the following also works
echo find(
    haystack :'PHP is awesome!',
    needle : 'awesome'
);


// sprintf returns a formatted string
function create_anchor( $text, $href = '#', $title = '', $target = '_self' ) 
{
    $href = $href ? sprintf('href="%s"', $href) : '';
    $title = $title ? sprintf('title="%s"', $title) : '';
    $target = $target ? sprintf('target="%s"', $target) : '';

    return "<a $href $title $target>$text</a>";
}

// if we wanted to create a link with target as _blank
// we could do this:
$link = create_anchor(
    'PHP Tutorial', 
    'https://www.phptutorial.net/',
    '',
    '_blank'
);

// however, we must provide title as empty string
// using named arguments we can skip that
$link = create_anchor(
    text : 'PHP Tutorial', 
    href : 'https://www.phptutorial.net/',
    target: '_blank'
);


// PHP allows you to call a function using both positional and named arguments.
// you need to place the named arguments after positional arguments. IMPORTANT
// otherwise you'll get an error
$link = create_anchor(
    'PHP Tutorial', // text
    'https://www.phptutorial.net/', // href
     target: '_blank' // target
);


