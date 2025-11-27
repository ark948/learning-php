USE `bookdb`;

DELIMITER $$
USE `bookdb`$$
CREATE PROCEDURE `get_books_published_after` (IN published_year INT)
BEGIN
	SELECT 
		book_id, title, isbn, published_date, name as publisher
	FROM 
		books b
	INNER JOIN publishers p 
		ON p.publisher_id = b.publisher_id
	WHERE year(published_date) > published_year;  
END$$

DELIMITER ;


CALL get_books_published_after(2010);