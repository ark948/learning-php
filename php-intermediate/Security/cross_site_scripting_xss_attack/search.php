<?php
    if (isset($_GET['comment'])) {
        echo $_GET['comment'] . PHP_EOL; // this is insecure, input could be js code

        echo htmlspecialchars($_GET['comment'], ENT_QUOTES, 'UTF-8');
        // this is secure
        // js code will simply be printed, and not executed

        // there are other functions similar to htmlspecialchars, such as:
        // filter_var
        // htmlentities

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="search.php" method="GET">
        <input type="text" name="comment">
        <button type="submit">Submit</button>
    </form>
</body>
</html>