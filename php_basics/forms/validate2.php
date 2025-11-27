<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the age field is set and not empty
    if (filter_has_var(INPUT_POST, 'age')) {
        // validate age between 0 and 150
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, [
            'options' => [ 'min_range' => 0, 'max_range' => 150 ]
        ]);

        if ($age !== false) {
            echo "Age is valid: " . htmlspecialchars($age);
        } else {
            echo "Age is not valid:" . $_POST['age'];
        }
    } 
}

?>


<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="age">Age:</label>
        <input type="text" name="age" placeholder="Enter your age">
        <button type="submit">Submit</button>
    </div>
</form>