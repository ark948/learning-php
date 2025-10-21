<?php


// A flash message allows you to create a message on one page and display it once on another page.

// $_SESSION will be used to transfer a flash message from page to another

// example
session_start();

// creating a new flash message on page 1
$_SESSION['flash_message'] = "I'm a flash message.";


// later on page 2:
// session_start();

if (isset($_SESSION['flash_message'])) {
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    echo $message;
}



// --------------------------
// a flash message has a name for reference
// a type such as error, success, information, warning
// and finally the message itself

// first we create a constant as a key for all flash messages
const FLASH = 'FLASH_MESSAGES';

// Second, define constants that define the type of flash messages including error, information, warning, and success:
const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';

// Third, define a function that creates a flash message which has a name, a message, and a type

/**
* Create a flash message 
* 
* @param string $name
* @param string $message
* @param string $type
* @return void
*/
function create_flash_message(string $name, string $message, string $type): void
{
    // remove existing message with the same name
    if (isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }

    // add the message to the session
    $_SESSION[FLASH][$name] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Format a flash message
 *
 * @param array $flash_message
 * @return string
 */
function format_flash_message(array $flash_message): string
{
    // example : <div class="alert alert-error"> This is an error! </div>
    return sprintf('<div class="alert alert-%s">%s</div>', $flash_message['type'], $flash_message['message']);
}


/**
* Display a flash message
*
* @param string $name
* @return void
*/
function display_flash_message(string $name): void
{
    if (!isset($_SESSION[FLASH][$name])) {
        return;
    }

    // get message from the session
    $flash_message = $_SESSION[FLASH][$name];

    // delete the flash message
    unset($_SESSION[FLASH][$name]);

    // display the flash message
    echo format_flash_message($flash_message);
}


// following function displays all flash messages from $_SESSION['FLASH']

/**
* Display all flash messages
*
* @return void
*/
function display_all_flash_messages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    // get flash messages
    $flash_messages = $_SESSION[FLASH];

    // remove all the flash messages
    unset($_SESSION[FLASH]);

    // show all flash messages
    foreach ($flash_messages as $flash_message) {
        echo format_flash_message($flash_message);
    }
}


// the following function uses the above functions to create, display one or all flash messages

/**
* Flash a message
*
* @param string $name
* @param string $message
* @param string $type (error, warning, info, success)
* @return void
*/
function flash(string $name = '', string $message = '', string $type = ''): void
{
    if ($name !== '' && $message !== '' && $type !== '') {
        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        display_flash_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        display_all_flash_messages();
    }
}

// to create a flash message: pass the three arguments
// to display a flash message, just provide the name
// to display all flash messages don't pass any arguments

// project example -> flash_messages folder