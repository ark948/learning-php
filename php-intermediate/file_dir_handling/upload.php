<?php


/**
 * files are uploaded to server from html forms
 * php makes them accessible through $_FILES superglobal
 * 
 * but they need to be validated, and then processed or stored securely.
 */


// $_FILES superglobal is an array that stores all information about uploaded files

// when a file is uploaded, PHP temporarily saves it on the server
// $_FILES holds filename, type, size, temporary name, and any error that may have occurred.

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $filename = $_FILES['myfile']["name"];
    $filetemp = $_FILES['myfile']["tmp_name"]; // example: C:\xampp\tmp\php89C2.tmp
    $filesize = $_FILES['myfile']["size"]; // in bytes
    $fileError = $_FILES['myfile']["error"]; // no error: 0

    // validation: check for upload errors
    if ($fileError !== UPLOAD_ERR_OK) {
        // UPLOAD_ERR_OK means files was uploaded successfully, default value of this constant is 0
        echo "Error uploading file";
        exit;
    }

    // validation: check file size
    if ($filesize > 2 * 1024 * 1024) {
        // 2 MB limit
        echo "File too large.";
        exit;
    }

    // validation: check file type
    $allowed = ['jpg', 'png', 'jpeg'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // aquire the extension of uploaded file
    if (!in_array($ext, $allowed)) {
        // if extension was not in allowed files array
        echo "Invalid file type.";
        exit;
    }

    echo "Name: $filename, Temp Name: $filetemp, Size: $filesize, Error code: $fileError" . PHP_EOL;

    // after validation and processing,
    // you may want to move the file to a secure location
    $newName = uniqid("file_", more_entropy: true) . "." . $ext;
    // more_entropy will add more security layers
    $destination = "uploads/" . basename($newName);
    if (move_uploaded_file($filetemp, $destination)) {
        echo "File uploaded and moved successfully.";
    } else {
        echo "Failed to move the uploaded file.";
    }

    // NOTE: we rename the file to a uniquely generated name
    // so that if two users uploaded a file accidentally with the same name like photo.jpg...
    // the conflict will be automatically resolved

    // Best practices:
        // store files outside the web root (so users cannot directly access them)
        // rename files to avoid overwriting or injection
        // limit allowed file types strictly (do not allow .php, .exe etc)
}

?>


<form action="upload.php" method="POST" enctype="multipart/form-data">
    Upload your file:
    <input type="file" name="myfile">
    <button type="submit">Upload</button>
</form>