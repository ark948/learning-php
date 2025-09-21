<?php
    echo 'Hello';
    header('Location: http://localhost/');
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            include_once 'heading.html';
            // include vs include_once: include_once only displays the content once
            // require statement also does the same thing as include
            // but does not throw error if file was not found


        ?>
    </body>
</html>