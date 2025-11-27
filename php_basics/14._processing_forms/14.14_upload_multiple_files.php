<?php


// all rules of uploading a single file are relevant to multiple files

// set the enctype attribute of html form to multipart/form-data

// input element must have multiple attribute
// and name must haev square brackets: name='files[]'

// to get the info of uploaded files
var_dump($_FILES['files']);

// practical example -> file_upload_multiple