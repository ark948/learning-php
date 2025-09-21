<?php
    declare(strict_types=1);

    function addNumbersStrict(int $num1, int $num2): int {
        return $num1 + $num2;
    }

    // this will cause a Fatal error
    echo addNumbersStrict('9', '2');
