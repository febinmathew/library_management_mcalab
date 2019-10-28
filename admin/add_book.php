<?php require '../sql_connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD BOOK</title>
</head>
<body>

<center>
<?php 
echo "name in post : ".$_POST["book_name"];
if ($_POST["book_name"]){
    $sql = "INSERT INTO books (book_name, book_author, book_publisher,book_publish_date,book_price,book_pages)
    VALUES ('".$_POST["book_name"]."', '".$_POST["book_author"]."', '".$_POST["book_publisher"]."','".$_POST["book_publish_date"]."',".$_POST["book_price"]." , ".$_POST["book_pages"].")";

if ($conn->query($sql) === TRUE) {

    echo "<h2>New book created successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else{ ?>


<h2>Enter your book details</h2>
<form method="POST">
<table>
	<tr>
		<td>Book Name</td><td><input type="text" name="book_name" required></td>
	</tr>
	<tr>
		<td>Author</td><td><input type="text" name="book_author" required></td>
	</tr>
	<tr>
		<td>Publisher</td><td><input type="text" name="book_publisher" required></td>
	</tr>
	<tr>
		<td>Published Date</td><td><input type="date" name="book_publish_date" required></td>
	</tr>
	<tr>
		<td>Pages</td><td><input type="text" name="book_pages" required></td>
	</tr>
	<tr>
		<td>Price</td><td><input type="text" name="book_price" requiredy></td>
	</tr>
	
</table>
<input type="submit" name="submit" value="SUBMIT">
</form>
<?php } ?>
</center>

</body>
</html>
