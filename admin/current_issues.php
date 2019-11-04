<?php require '../auth_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Issuers Details</title>

	<style type="text/css">
		.view_issue 
		{
			display: none;
		}
		table, th, td
		{
  			border: 1px solid black;
  			border-collapse: collapse;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<body class="iframe_body">
<center>
<h2 class="view_issue"><input type="button" name="stuview" value="Student"><input type="button" name="facview" value="Faculty"></h2>

<?php 
$book_issue_table="book_issue";
$sql = "SELECT * FROM book_issue LEFT JOIN books ON book_issue.book_id=books.id " .
"LEFT JOIN (users LEFT JOIN department ON users.department=department.id) ON book_issue.user_id=users.user_id";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
?>

<table>
	<tr>
		<th>Book ID</th>
		<th>Book Name</th>
		<th>Issuers ID</th>
		<th>Issuer Name</th>
		<th>Department</th>
		<th></th>
	</tr>

	<?php while($row = $result->fetch_assoc()) {

echo "<tr><td>" . $row["books.id"]. "</td><td>". $row["books.book_name"]. "</td><td>"
. $row["users.user_id"]. "</td><td>". $row["users.user_name"]. "</td><td>"
. $row["department.dep_name"]. "</td>". "</tr>";
}
?>


</table>
<?php } else {
	echo "<h2>No Issues made yet</h2>";
} ?>
</center>
</body>
</html>