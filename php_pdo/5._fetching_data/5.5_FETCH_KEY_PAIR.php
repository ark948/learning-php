<?php

// both fetch() and fetchAll() accept a very useful mode called PDO::FETCH_KEY_PAIR

// the PDO::FETCH_KEY_PAIR allows us to retrieve two-column result in an array where the first column is the key, and the second column is value

// useful for creating <select> elements

// For example, you can create a <select> element with the values are publisher id and texts are publisher names

$pdo = require 'connect.php';

$sql = 'SELECT publisher_id, name 
        FROM publishers';

$statement = $pdo->query($sql);
$publishers = $statement->fetchAll(PDO::FETCH_KEY_PAIR);

// the reuslt would be like this:
/*
Array
(
    [1] => McGraw-Hill Education
    [2] => Penguin/Random House 
    [3] => Hachette Book Group
    [4] => Harper Collins
    [5] => Simon and Schuster
)
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>publishers</title>
</head>
<body>
    <label for="publisher">Select a pulisher</label>
    <?php foreach ($publishers as $publisher_id => $name): ?>
        <option value="<?php echo $publisher_id ?>">
            <?php echo $name ?>
        </option>
    <?php endforeach ?>
</body>
</html>