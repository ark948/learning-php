<?php
    session_start();
    echo '<br>Food: '.$_SESSION['myFavFood'];
    echo '<br>Drink: '.$_SESSION['myFavDrink'];
    echo 'Color: '.$_SESSION['myFavColor'];