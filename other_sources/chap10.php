<?php

    include 'AwardWinningMovie.php';

    $awm = new AwardWinningMovie('A12324', 'Max', 6.99, 'Best Picture');

    echo $awm->recommend('Japan');

    echo $awm->displayHeading('H1');