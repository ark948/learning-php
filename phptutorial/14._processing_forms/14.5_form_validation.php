<?php


// when processing a form, it is critical to validate user input
// there are two types of validation:
// client side validation (using html5 validation or javascript)
// server side validation (using php)

// to validate data in php, filter_has_var could be used to check if variable exists in GET or POST
// and filter_input to validate data

// form example of email validatino
// refer to forms/validate1.php

// for example of integer validation
// refer to forms/validate2.php

// for example of validating floats
// refer to froms/validate3.php


// refer to form_validation folder for a complete example:

    // index.php	.	Contain the main logic of the form
    // header.php	inc	Contain the header code
    // footer.php	inc	Contain the footer code
    // get.php	inc	Contain the email subscription form
    // post.php	inc	Contain the code for handling form submission
    // style.css	css	Contain the CSS code