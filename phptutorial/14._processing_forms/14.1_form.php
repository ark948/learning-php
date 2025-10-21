<?php


// form element has two important attributes
// action which is the url that processes the form submission
// method specifies the http method for submitting the form, such as GET and POST
// default is GET
// method is case-insensitive, post or POST are ok, get and GET are also ok

// important attributes of form fields are name, type and value
// php uses name attribute to access the value

// in POST, the form data will be submitted in request's body
// which can be accessed using the associative array $_POST superglobal

// use isset() to check if an input exists

// use GET when you are only retrieving data from server
// use POST when you have a form that causes a change in the server

// currently this script is vulnerable to cross site scripting (XSS) attack
// to prevent this, always escape the data entered by user using htmlspecialchars() function

// refer to forms/sercure_form.php for example

// self-processing form
// sometimes the form and the file that processes the form are the same
// in this scenario, if there is a need to change the filename, form action needs updating as well
// which is not convenient. in this case, use $_SERVER['PHP_SELF'] which will return the filename currently executing script
// refer to forms/self_form.php


// for a project structure recommendation go to form_processing/


if (isset($_POST['email'])) {
    var_dump($_POST['email']);
}

?>

<!-- this is form with a simple email input -->
<form action="form.php" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" />
    </div>
    <button type="submit">Submit</button>
</form>


<!-- refer to forms/form.php for example -->