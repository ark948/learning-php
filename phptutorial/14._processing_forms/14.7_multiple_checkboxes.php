<?php


// a form may contain multiple checkboxes with the same name
// when that form is sbumitted, you'll receive mulitple values under the same name

// php will create an associative array for it

// refer to form_processing 
// a checkbox group will be added to it
// IMPORTANT Update: due to complexity and new concepts, this lesson will have a new project folder form_validation2

// $_POST['colors'] will be this:
// array(3) 
// { 
//     [0]=> string(3) "red" 
//     [1]=> string(5) "green" 
//     [2]=> string(4) "blue" 
// }