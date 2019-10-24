<?php require '../sql_connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD BOOK</title>
</head>
<body>

<center>
<?php 
echo "<h2>New book created successfully</h2>";
if ($_POST["book_name"]){


    $sql = "INSERT INTO books (book_name, book_author, book_publisher,book_price,book_pages)
    VALUES ('test', 'tes', 'test', 2, 3)";
if ($conn->query($sql) === TRUE) {
    echo "<h2>New book created successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else{ ?>


<h2>Enter your book details</h2>
<form>
<table>
	<tr>
		<td>Book Name</td><td><input type="text" name="book_name"></td>
	</tr>
	<tr>
		<td>Author</td><td><input type="text" name="book_author"></td>
	</tr>
	<tr>
		<td>Publisher</td><td><input type="text" name="book_publisher"></td>
	</tr>
	<tr>
		<td>Published Date</td><td><input type="text" name="pubdat"></td>
	</tr>
	<tr>
		<td>Pages</td><td><input type="text" name="book_pages"></td>
	</tr>
	<tr>
		<td>Price</td><td><input type="text" name="book_price"></td>
	</tr>
	
</table>
<input type="submit" name="submit" value="SUBMIT">
</form>
<?php } ?>
</center>

</body>
</html>
