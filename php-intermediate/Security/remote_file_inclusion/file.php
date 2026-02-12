<?php


if (isset($_GET['page'])) {
    $pages = [ // our whitelist
        "home" => "pages/home.php",
        "about" => "pages/about.php",
    ];
    
    $page = $_GET['page'] ?? 'home'; // if $_GET['page'] was null, default to 'home'
    if (array_key_exists($page, $pages)) {
        include $pages[$page];
    } else {
        include $pages['home'];
    }    
}