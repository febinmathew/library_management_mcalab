
<?php require '../auth_check.php'; ?>
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
		.form-group{
			display:inline-block;
		}
</style>
<link rel="stylesheet" type="text/css" href="../styles/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="iframe_body">

<form method="POST" class="p-2">
<div class="form-group  col-sm-4">
    <label for="exampleFormControlInput1">Search by Book name</label>

    <input type="text" name="search_text" class="form-control" id="exampleFormControlInput1" placeholder="ex : Half Girl Friend">
	
	
</div>

<div class="form-group col-sm-4">
    <label for="exampleFormControlInput2">Search by Author name</label>

    <input type="text" name="search_author" class="form-control" id="exampleFormControlInput2" placeholder="ex : Chetan Bhagat">
	

</div>

<input type="submit" name="search" value="Search" class="btn btn-primary col-sm-2"></input>

</form>
<?php 
if (isset($_POST["search_text"]) || isset($_POST["search_author"])){
	$sql = "SELECT * FROM books WHERE book_name LIKE '%".$_POST["search_text"]."%' AND book_author LIKE '%".$_POST["search_author"]."%' AND  book_quantity>0;";
}
else
$sql = "SELECT * FROM books WHERE book_quantity>0;";

//echo $sql;
$result=$conn->query($sql);

if ($result->num_rows > 0) {
?>
<span class="form_area">


<table class="table">
<thead class="thead-dark">
<tr>
		<th scope="col">Book ID</th>
		<th scope="col">Name</th>
		<th scope="col">Author</th>
		<th scope="col">Publisher</th>
		<th scope="col">Published Date</th>
		<th scope="col">Quantity</th>
		<th scope="col">Price</th>
		
</tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()) {
echo '<form action="/sdfsdfsdf.php" method="POST">';
echo "<tr><td>" . $row["id"]. "</td><td>". $row["book_name"]. "</td><td>"
. $row["book_author"]. "</td><td>". $row["book_publisher"]. "</td><td>"
. $row["book_publish_date"]. "</td><td>". $row["book_quantity"]. "</td><td>"
. $row["book_price"]. "</td>". "</tr>";
}
echo '<form>'
?>
	</tbody>
</table>
</span>
<?php } else {
	echo "<h2>No books available</h2>";
} ?>



</body>
</html>