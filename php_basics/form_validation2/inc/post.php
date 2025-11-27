<?php

if (filter_has_var(INPUT_POST, 'pizza_toppings')) {
    // get the pizza toppings from the form
    $selected_toppings = filter_input(INPUT_POST, 'pizza_toppings', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];

    // select the topping names, aka get all the keys
    $toppings = array_keys($pizza_toppings);

    $_SESSION['selected_toppings'] = []; // new array to keep the selected toppings
    $total = 0; // for sorting total

    if ($selected_toppings) {
        foreach ($selected_toppings as $topping) {
            if (in_array($topping, $toppings)) {
                $_SESSION['selected_toppings'][] = $topping; // we fill the selected_toppings here, and put the entire array in session
                $total += $pizza_toppings[$topping];
            }
        }
    }
}

?>

<?php if ($_SESSION['selected_toppings']) : ?>
    <!-- here we check the session and display the content of selected_toppings -->
    <h1>Order Summary</h1>
    <ul>
        <?php foreach ($_SESSION['selected_toppings'] as $topping) : ?>
            <li>
                <span><?php echo ucfirst($topping) ?></span>
                <span><?php echo '$' . $pizza_toppings[$topping] ?></span>
            </li>
        <?php endforeach ?>

        <li class="total"><span>Total</span><span><?php echo '$' . $total ?></span></li>
    </ul>
<?php else : ?>
    <p>You didn't select any pizza toppings.</p>
<?php endif ?>

<menu>
    <a class="btn" href="<?= htmlentities($_SERVER['PHP_SELF']) ?>" title="Back to the form">Change Toppings</a>
</menu>