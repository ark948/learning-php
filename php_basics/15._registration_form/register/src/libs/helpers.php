<?php


function view(string $filename, array $data = []): void
{
    // create variables from the associative array
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require_once __DIR__ . '/../inc/' . $filename . '.php';
}


// This view() function loads the code from a file without the need of specifying the .php file extension

// The view() function allows you to pass data to the included file as an associative array.
//  In the included file, you can use the keys of elements as the variable names and the values as the variable values.

// example, following uses the view() function to load the code from the header.php file and makes the title as a variable in the header.php file
/* 
// <?php view('header', ['title' => 'Register']) ?>
*/


function is_post_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

function is_get_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}

function error_class(array $errors, string $field): string
{
    return isset($errors[$field]) ? 'error' : '';
}

function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
}

function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }

    redirect_to($url);
}

function redirect_with_message(string $url, string $message, string $type=FLASH_SUCCESS)
{
    flash('flash_' . uniqid(), $message, $type);
    redirect_to($url);

}

function session_flash(...$keys): array
{
    $data = [];
    foreach ($keys as $key) {
        if (isset($_SESSION[$key])) {
            $data[] = $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            $data[] = [];
        }
    }
    return $data;
}