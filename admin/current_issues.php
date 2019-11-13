<?php require '../auth_check.php'; 
function getStatusTextFromCode($status){

	if($status==0)
		return "Issued";
	else if($status==1)
		return "Returned";
	else
		return "Un-kown";

}

function getStatusButtonFromCode($status){

	
	//$str = '<form action="POST" >';
	//$str = '';
	//$str = '<button value="Return">Test</button>';
	//$str += '</form>';
	//$str += '<button value="Return">Return</button>';
	//return $str;
	if($status==0){
		$str = '<button value="Return">Return</button>';
	}
	else if($status==1){
		
	}
	else
		return "Un-kown";
	
	//$str += '</form>';
	//echo "hi";
	return $str;

}
?>
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
$sql = "SELECT book_issue.issue_status as issue_status,
books.id as id,
 books.book_name as book_name,
 users.user_id as user_id,
 users.user_name as user_name,
 department.dep_name as dep_name

 
  FROM book_issue LEFT JOIN books ON book_issue.book_id=books.id " .
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
		<th>Status</th>
		<th>Action</th>
	</tr>

	<?php 

	
	while($row = $result->fetch_assoc()) {

echo "<tr><td>" . $row["id"]. "</td><td>". $row["book_name"]. "</td><td>"
. $row["user_id"]. "</td><td>". $row["user_name"]. "</td><td>"
. $row["dep_name"]. "</td>". "</td><td>"
.getStatusTextFromCode($row["issue_status"]). "</td><td>"
.getStatusButtonFromCode($row["issue_status"]). "</td>". "</tr>";
}


?>


</table>
<?php

//echo $result->num_rows;
} else {
	
	echo "<h2>No Issues made yet</h2>";
} ?>
</center>
</body>
</html>