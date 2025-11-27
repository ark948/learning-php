<?php


// Typically, you have a variable with a predefined name. For example, 
// the following defines a variable with the name $title that holds a string

$title = 'PHP variable variables';

// In PHP, the name of a variable can be derived from the value of another variable. For example:

$my_var= 'title';
$$my_var = 'PHP variable variables'; // note the double $

echo $title; // PHP variable variables

// First, define a variable $my_var that holds the string 'title'.
// Second, define a variable variable that holds the string 'PHP variable variables'.
//  Note that we use double $ signs instead of one. By doing this, we technically create another variable with the name $title.
// Third, display the value of the $title variable.

// for the rest of this lesson, go to project_sample2


