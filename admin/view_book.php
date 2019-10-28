<?php require '../sql_connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book View</title>
	<style>
		table, th, td
		{
  		border: 1px solid black;
  		border-collapse: collapse;
		}
</style>
</head>
<body>
<center>

<?php 

$sql = "SELECT * FROM books ";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
?>

<table>
<tr>
		<th>Book ID</th>
		<th>Name</th>
		<th>Author</th>
		<th>Publisher</th>
		<th>Published Date</th>
		<th>Pages</th>
		<th>Price</th>
</tr>
<?php while($row = $result->fetch_assoc()) {

echo "<tr><td>" . $row["id"]. "</td><td>". $row["book_name"]. "</td><td>"
. $row["book_author"]. "</td><td>". $row["book_publisher"]. "</td><td>"
. $row["book_publish_date"]. "</td><td>". $row["book_pages"]. "</td><td>"
. $row["book_price"]. "</td>". "</tr>";
}
?>
	
</table>
<?php } else {
	echo "<h2>No books available</h2>";
} ?>

</center>

</body>
</html>