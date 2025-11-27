<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the weight field is set and not empty
    if (filter_has_var(INPUT_POST, 'weight')) {
        // validate weight between 0 and 150
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT, [
            'options' => [
                'min_range' => 0,
                'max_range' => 300

            ]
        ]);

        // Note that the filter FILTER_VALIDATE_FLOAT trims the input before validating.

        if ($weight !== false) {
            echo "Weight is valid: " . htmlspecialchars($weight);
        } else {
            echo "Weight is not valid:" . $_POST['weight'];
        }
    } 
}

?>



<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="weight">Weight:</label>
        <input type="text" name="weight" placeholder="Enter your weight in lbs">
        <button type="submit">Submit</button>
    </div>
</form>