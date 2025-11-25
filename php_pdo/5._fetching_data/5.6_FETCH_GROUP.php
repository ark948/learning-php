<?php

// PDO::FETCH_GROUP allows us to group rows into a nested array, with indexes as unique values, and the values will be the remaining columns

// useful for in cases of generating grouped data

// The following example selects the books and publishers from the books and publishers table. The PDO::FETCH_GROUP groups the books by the publisher names

$pdo = require 'connect.php';
$sql = 'SELECT name, book_id, title
        FROM publishers p
        INNER JOIN books b ON b.publisher_id = p.publisher_id';

$statement = $pdo->query($sql);
$publishers = $statement->fetchALl(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <label for="book">Select a book:</label>
    <select name="book" id="book">
        <?php foreach ($publishers as $publisher => $books) : ?>
        <optgroup label="<?php echo $publisher ?>">
            <?php foreach ($books as $book) : ?>
            <option value="<?php echo $book['book_id'] ?>"><?php echo $book['title'] ?></option>
            <?php endforeach ?>
        </optgroup>
        <?php endforeach ?>
    </select>
</body>
</html>

