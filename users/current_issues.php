<?php require '../auth_check.php'; 
function getStatusTextFromCode($status){

if($status==0)
	return "Issued";
else if($status==1)
	return "Returned";
else
	return "Un-kown";

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Issue History</title>

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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="iframe_body">
<center>
<h2 class="view_issue"><input type="button" name="stuview" value="Student"><input type="button" name="facview" value="Faculty"></h2>

<?php 
$book_issue_table="book_issue";




$sql = "SELECT 

book_issue.issue_status as issue_status,

book_issue.issue_id as issue_id,
books.id as book_id,
 books.book_name as book_name,
 users.user_id as user_id,
 users.user_name as user_name,
 department.dep_name as dep_name

 FROM book_issue LEFT JOIN books ON book_issue.book_id=books.id " .
"LEFT JOIN (users LEFT JOIN department ON users.department=department.id) ON book_issue.user_id=users.user_id WHERE users.user_email='". $_SESSION["session_email"]."'";

//echo $sql;
$result=$conn->query($sql);

if ($result->num_rows > 0) {
?>
<h2 class="m-3">Your book Issue history</h2>
<table class="table">
<thead class="thead-dark">
	<tr>
		<th scope="col">Book ID</th>
		<th scope="col">Book Name</th>
		<th scope="col">Issuers ID</th>
		<th scope="col">Issuer Name</th>
		<th scope="col">Department</th>
		<th scope="col">Status</th>
	
	</tr>

	<?php while($row = $result->fetch_assoc()) {

echo "<tr><td>" . $row["book_id"]. "</td><td>". $row["book_name"]. "</td><td>"
. $row["user_id"]. "</td><td>". $row["user_name"]. "</td><td>"
. $row["dep_name"]. "</td><td>"
.getStatusTextFromCode($row["issue_status"]). 

"</td></tr>";
}
?>

</tbody>
</table>
<?php } else {
	echo "<h2>No Issues made yet</h2>";
} ?>
</center>
</body>
</html>