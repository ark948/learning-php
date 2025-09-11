<?php

    setcookie('userName', 'Joy', time() + 120);

    // time() will give us the current Unix timestamp
    // here 120 means that this cookie will expire 120 seconds after it is set

    // modifying a cookie
    setcookie('userAge', 25, time() + 3600);
    setcookie('userAge', 26, time() + 3600);

    // deleting a cookie
    setcookie('userLevel', 3, time() + 3600);
    setcookie('userLevel', 3, time() - 3600);
    
    // IMPORTANT: when a cookie has an expiry in the past, it gets deleted.

    