<?php


// input element with type="file" allows users to upload files

// the value of the input element will hold the path to the selected file

// to upload multiple files you add multiple to end of the input element

// accept attribute will restrict users to specified file types
// this could be: valid case-insensitive file name extension, a valid MIME type string,
// or A string like image/* (any image file), video/* (any video file), audio/* (any audio file).

// if allowed users to upload multiple files, you need to separate them using a comma
// example
// <input type="file" accept="image/png, image/jpeg" name="file">

// The <form> element that contains the file input element must have the enctype attribute with the value multipart/form-data
// <form enctype="multipart/form-data" action="upload.php" method="post">
// </form>


// php has important options that allow for controlling the file upload mechanism
// these options will be in php.ini file
// if you don't know where the php.ini file is, use the following code:
echo php_ini_loaded_file();

// usually:
// C:\xampp\php\php.ini

// some important settings:
// ; Whether to allow HTTP file uploads.
// file_uploads=On

// ; Temporary directory for HTTP uploaded files (will use system default if not
// ; specified).
// upload_tmp_dir="C:\xampp\tmp"

// ; Maximum allowed size for uploaded files.
// upload_max_filesize=2M

// ; Maximum number of files that can be uploaded via a single request
// max_file_uploads=20

// post_max_size 
// The post_max_size specifies the maximum size of the POST data. 
// Since you’ll upload files with the POST request, you need to make sure that the post_max_size is greater than upload_max_size.

// to access the information of uploaded files, you use $_FILES array
// For example, if the name of the file input element is file, you can access the uploaded file via $_FILES['file'].

// the $_FILE is an associative array that consists of the following keys:
// name: The name of the uploaded file.
// type: The MIME type of the upload file e.g., image/jpeg for JPEG image or application/pdf for PDF file.
// size The size of the uploaded file in bytes.
// tmp_name: The temporary file on the server that stored the uploaded filename. If the uploaded file is too large, the tmp_name is "none".
// error: The error code that describes the upload status e.g., UPLOAD_ERR_OK means the file was uploaded successfully

// some error codes:
const MESSAGES = [
    UPLOAD_ERR_OK => 'File uploaded successfully',
    UPLOAD_ERR_INI_SIZE => 'File is too big to upload',
    UPLOAD_ERR_FORM_SIZE => 'File is too big to upload',
    UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder on the server',
    UPLOAD_ERR_CANT_WRITE => 'File is failed to save to disk.',
    UPLOAD_ERR_EXTENSION => 'File is not allowed to upload to this server',
];


// If you want to get a message based on an error code, you can look it up in the MESSAGES array like this:
$message = MESSAGES[$_FILES['file']['error']];

// when file is uploaded successfully, it is stored in a temporary directory of the server
// and you can use move_upload_file() to move the uploaded file from tmp dir to another one

// move_uploaded_file() accepts two args
// filename: is the name of the uploaded file which is $_FILES['file']['tmp_name']
// destination: is the destination of the moved file

// All the information in the $_FILES variable cannot be trusted except for the tmp_name. 
// Hackers can manipulate the $_FILES and uploads the malicious script to the server.
// therefore, the information in the $_FILES needs to be validated

// first check if the file exists by using isset()
if (!isset($_FILES['file_name_of_input_element'])) {
    // if file does not exist
    // error
}

// second, check the size of the file by filezise() function and compare it with maximum allowed file size
// you should not trust the size provided by $_FILES
const MAX_SIZE  = 5 * 1024 * 1024; //  5MB
if (filesize($_FILES['file']['tmp_name']) > MAX_SIZE) {
   // error
}

// IMPORTANT
// Note that the MAX_SIZE must not be greater than upload_max_filesize specified in the php.ini.

// The size of a file is in bytes, which is not human-readable. 
// To make it more readable, we can define a function that converts the bytes to a human-readable format e.g., 1.20M, 2.51G
function format_filesize(int $bytes, int $decimals = 2): string
{
    $units = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $units[(int)$factor];
}


// third validate the file type of the file against the allowed file types
// so we need a list of allowed file types
const ALLOWED_FILES = [
    'image/png' => 'png',
    'image/jpeg' => 'jpg'
];

// To get the real mime type of a file, you use three functions: finfo_open(), finfo_file(), and finfo_close().
// The finfo_open() returns a new fileinfo resource.
// The finfo_file() returns the information about the file.
// The finfo_close() closes the fileinfo resource.

// to make this process more readable, we can write a funciton for it:
function get_mime_type(string $filename)
{
    $info = finfo_open(FILEINFO_MIME_TYPE);
    if (!$info) {
        return false;
    }

    $mime_type = finfo_file($info, $filename);
    finfo_close($info);

    return $mime_type;
}


// Note that the Internet Assigned Numbers Authority (IANA) is in charge of all official MIME types

// if an error occurred or validation failed, you can set a flash message and redirect the user back to upload page
function redirect_with_message(string $message, string $type=FLASH_ERROR, string $name='upload', string $location='index.php'): void
{
    flash($name, $message, $type);
    header("Location: $location", true, 303);
    exit;
}
// the flash() function comes from some previous lesson, flash.php
if ($error) {
    redirect_with_message('An error occurred');
}


// If you place a field with the name MAX_FILE_SIZE before a file input element in the form,
// PHP will use that value instead of upload_max_filesize for validating the file size
// IMPORTANT, you should never rely on this method (since it can be manipulated)
// Note that you cannot set the MAX_FILE_SIZE larger than the upload_max_filesize directive in the php.ini file.

// for prectical example -> file_upload folder

?>
<form enctype="multipart/form-data" action="upload.php" method="post">
    <div>
        <label for="file">Select a file:</label>
        <!-- php will use this hidden field to validate the file size -->
        <input type="hidden" name="MAX_FILE_SIZE" value="10240"/>
        <input type="file" id="file" name="file"/>
    </div>
    <div>
        <button type="submit">Upload</button>
    </div>
</form>
