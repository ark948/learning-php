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

    /**
     * How does PHP detects the true MIME of the uploaded file?
     * It reads a specific pattern of bytes (may be referred to as Magic Byte) at the beginning of a file. (it's the file's internal signature or fingerprint)
     * (it is embedded in the file's binary data)
     * and matches it against a database of known signatures to identify the true type of data (MIME). (This is according to ChatGPT, modified for brevity by me)
     * 
     */
}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Choose a file:</label><br><br>
    <input type="file" name="file" required><br><br>
    <input type="submit" name="submit" value="Upload File">
</form>