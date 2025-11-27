<?php

// a function is a named block of code that performs a specific task

// we need them in case we wanted to perform the same task multiple times

// to define a function named welcome()

function welcome() 
{
    echo 'welcome';
}

welcome();

// a function may have zero or more parameters.
// inside the function these parameters are considered local variables

function welcome_user($username)
{
    echo 'Welcome' . $username;
}

welcome_user('Admin');

// parameter vs arguemnt
// parameter are inputs that are provided to a function when defining the function
// arguments are pieces of data that you pass to the function when you call it

// a function can have a return value

function welcome_user2($username)
{
    return 'Welcome '. $username . '!';
}

$welcome_message = welcome_user2('Admin');

echo welcome_user2();

?>

<?php function welcome_user3($username) { ?>
    <!-- a function should contain only php, but it is possible to include html -->
	<span>Welcome <?= $username ?></span>
<?php } ?>