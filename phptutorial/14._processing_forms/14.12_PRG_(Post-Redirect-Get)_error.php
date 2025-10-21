<?php


// how to use the PHP PRG (Post-Redirect-Get) technique to prevent the double form submission problem

// the double submit problem
// if user clicks on refresh butotn after submitting a form (by post)
// the browser will submit the form again (although the browser will ask for confirmation and if user comfirms it)
// this may cause issues such as duplicate records in the database

// PRG technique tends to solve this issue
// mainly by sending a GET request as the result response
// so that even if the user refresh the page, the result will simply be another GET request to the result page
// note: the result page and the page which contain the form could be the same

// here is an example (That will demonstrate the problem)

const MIN_DONATION = 1;
$errors = [];
$inputs = [];
$valid = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // first we check if the value exists
    // if it does, then we'll check if it is valid to our standards

    // sanitize & validate amount
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    // IMPORTANT if you don’t specify the FILTER_FLAG_ALLOW_FRACTION flag, function will remove the decimal point (.) from the entered value.
    // If the amount doesn’t exist in the INPUT_POST, the filter_input() returns null
    // If the amount is not a valid float, the filter_input() function returns false.
    $inputs['amount'] = $amount;
    if ($amount !== false && $amount !== null) {
        $amount = filter_var($amount, FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => MIN_DONATION]]);
        if ($amount === false) {
            $errors['amount'] = 'The minimum donation is $1';
        } else {
            $valid = true;
        }
    } else {
        $errors['amount'] = 'Please enter a donation amount';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP - without PRG</title>
</head>

<body>
    <main>
        <form action="index.php" method="post">
            <h1>Donation</h1>
            <?php if ($valid): ?>
                <div class="alert alert-success">
                    Thank you for your donation of $<?= $inputs['amount'] ?? '' ?>
                </div>
            <?php endif ?>
            <div>
                <label for="amount">Amount:</label>
                <input type="text" name="amount" value="<?= $inputs['amount'] ?? '' ?>" id="amount" placeholder="Minimum donation $<?= MIN_DONATION ?>">
                <small><?= $errors['amount'] ??  '' ?></small>
            </div>
            <button type="submit">Donate</button>
        </form>
    </main>
</body>
</html>