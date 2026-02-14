<?php


if (isset($_POST['submit'])) {

    // Checking file extension
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $file_ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    
    if (!in_array(needle: $file_ext, haystack: $allowed)) {
        die("Invalid file type.");
    } else {
        // continue uploading or processing
        echo "extension ok";
    }

    
    // Validating MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    // finfo_open() -> create new file information resource
    // and configure it to detect MIME type
    $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
    // return the info of the resource, specifically the MIME
    finfo_close($finfo);

    $allowed_mime = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($mime, $allowed_mime)) {
        die("Invalid mime.");
    } else {
        echo "mime ok";
    }


    // Limiting file size
    $fileSize = $_FILES['file']['size'];
    if ($fileSize > 2*1024*1024) { // 2 MB Limit (1024 is a byte)
        die("File too large.");
    } else {
        echo "file size ok";
    }


    // Renaming files
    $uploadDir = __DIR__ . "/uploads/";
    $tmpName = $_FILES['file']['tmp_name'];
    $originalName = $_FILES['file']['name'];
    
    // extract the file extension
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    // generate a unique name
    $newName = uniqid("file_", more_entropy: true) . "." . $extension;
    
    // full path to save the file
    $destination = $uploadDir . $newName;

    // move file from temp to uploads directory (using alternative syntax, just for fun)
    if (move_uploaded_file(from: $tmpName, to: $destination)):
        echo "File uploaded successfully as: " . htmlspecialchars($newName);
    else:
        echo "Error moving uploaded file.";
    endif;

}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Choose a file:</label><br><br>
    <input type="file" name="file" required><br><br>
    <input type="submit" name="submit" value="Upload File">
</form>