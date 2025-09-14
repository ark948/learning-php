<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        echo $email;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['term'])) {
        $term = $_GET['term'];

        if ($term)
            echo "<p>You searched for: <br>$term</br> </p>";
    }
}

?>

<!-- if you enter a js code in this form, it will execute, which is dangerous (xss attack) -->

<form action="form.php" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" />
    </div>
    <button type="submit">Submit</button>
</form>



<form action="form.php" method="get">
    <div>
        <label for="term">Search:</label>
        <input type="search" name="term" placeholder="Enter search term">
        <button type="submit">Search</button>
    </div>
</form>