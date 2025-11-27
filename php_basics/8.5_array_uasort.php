<?php


// The uasort() function sorts the elements of an associative array with a user-defined comparison function and maintains the index association


// The followning example uses the uasort() function to sort an associative array
$countries = [
    'China' => ['gdp' => 12.238 , 'gdp_growth' => 6.9],
    'Germany' => ['gdp' => 3.693 , 'gdp_growth' => 2.22 ],
    'Japan' => ['gdp' => 4.872 , 'gdp_growth' => 1.71 ],
    'USA' => ['gdp' => 19.485, 'gdp_growth' => 2.27 ],
];

// sort the country by GDP
uasort($countries, function ($x, $y) {
    return $x['gdp'] <=> $y['gdp'];
});

// show the array
foreach ($countries as $name => $stat) {
    echo "$name has a GDP of {$stat['gdp']} trillion USD with a GDP growth rate of {$stat['gdp_growth']}%" . '<br>';
}

/*
Germany has a GDP of 3.693 trillion USD with a GDP growth rate of 2.22%
Japan has a GDP of 4.872 trillion USD with a GDP growth rate of 1.71%  
China has a GDP of 12.238 trillion USD with a GDP growth rate of 6.9%  
USA has a GDP of 19.485 trillion USD with a GDP growth rate of 2.27% 
*/

