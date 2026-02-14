<?php


if (isset($_POST['submit'])) {
    $age = $_POST['age'];
    // echo "You are $age years old."; // this is BAD, may cause issues   

    // Adding backend validation
    if (empty($age)) {
        die("Empty input.");
    } else {
        if (!filter_var($age, FILTER_VALIDATE_INT)):
            die("Invalid age.");
        endif;
    }
    echo "You are " . (int)$age . " years old."; // this is GOOD
}

?>


<form action="validate.php" method="post">
    Enter your age:
    <input type="text" name="age">
    <input type="submit" name="submit" value="submit">
</form>