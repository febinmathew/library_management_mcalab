<?php require '../sql_connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD BOOK</title>
</head>
<body>

<center>
<h2>Enter your book details</h2>
<form>
<table>
	<tr>
		<td>Book Name</td><td><input type="text" name="bkname"></td>
	</tr>
	<tr>
		<td>Author</td><td><input type="text" name="bkautr"></td>
	</tr>
	<tr>
		<td>Publisher</td><td><input type="text" name="bkpub"></td>
	</tr>
	<tr>
		<td>Published Date</td><td><input type="text" name="pubdat"></td>
	</tr>
	<tr>
		<td>Pages</td><td><input type="text" name="bkpage"></td>
	</tr>
	<tr>
		<td>Price</td><td><input type="text" name="bkprice"></td>
	</tr>
	
</table>
<input type="submit" name="submit" value="SUBMIT">
</form>
</center>

</body>
</html>
