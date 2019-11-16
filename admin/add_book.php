<?php 
require '../auth_check.php'; 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/main.css">
	<title>ADD BOOK</title>
	<style type="text/css">
               div.nav
               {
                       background-color: #e6b0aa   ;
               }
               body
               {

                       background-image: url("book1.jpg");
                       background-size: cover;
               }
               .c
               {
                       color: white;
                       font-weight: bold;

               }
               h2
               {
                       color: black;
                       
              }

       </style>
</head>
<body>

<center>
<?php 
echo "name in post : ".$_POST["book_name"];
if ($_POST["book_name"]){

    $sql = "INSERT INTO books (book_name, book_author, book_publisher,book_publish_date,book_price,book_quantity)
    VALUES ('".$_POST["book_name"]."', '".$_POST["book_author"]."', '".$_POST["book_publisher"]."','".$_POST["book_publish_date"]."',".$_POST["book_price"]." , ".$_POST["book_quantity"].")";

if ($conn->query($sql) === TRUE) {

    echo "<h2>New book created successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else{ ?>
<span class="form_area">

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
		<td>Quantity</td><td><input type="text" name="book_quantity" required></td>
	</tr>
	<tr>
		<td>Price</td><td><input type="text" name="book_price" requiredy></td>
	</tr>
	
</table>
<input type="submit" name="submit" value="SUBMIT">

</form>
</span>
<?php } ?>
</center>

</body>
</html>
