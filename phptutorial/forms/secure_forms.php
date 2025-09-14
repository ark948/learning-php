<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['term'])) {
        $term = $_GET['term'];

        if ($term) {
            $clean_term = htmlspecialchars($term, ENT_QUOTES, 'UTF-8');
            // perform search and show the result
            echo "<p>The result: <br>$clean_term</b></p>";
        }
    }
}

?>


<!-- if you enter a js script here, it will not affect the script which is safe -->

<form action="secure_form.php" method="get">
    <div>
        <label for="term">Search:</label>
        <input type="search" name="term" placeholder="Enter search term">
        <button type="submit">Search</button>
    </div>
</form>