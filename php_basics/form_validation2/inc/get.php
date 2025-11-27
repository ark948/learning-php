<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

    <h1>Please select your pizza toppings:</h1>
    <ul>
        <?php foreach ($pizza_toppings as $topping => $price) : ?>
            <li>
                <div>
                    <input 
                        type="checkbox" 
                        name="pizza_toppings[]" 
                        value="<?php echo $topping ?>" 
                        id="pizza_topping_<?php echo $topping ?>" 
                        <?php echo checked($topping, $_SESSION['selected_toppings'] ?? []) ?> 
                    />
                    <label for="pizza_topping_<?php echo $topping ?>"><?php echo ucfirst($topping) ?></label>
                </div>
                <span><?php echo '$' . $price ?></span>
            </li>
        <?php endforeach ?>
    </ul>

    <button type="submit">Order Now</button>
</form>