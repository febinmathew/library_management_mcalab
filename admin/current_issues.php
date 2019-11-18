<?php require '../auth_check.php'; 
function getStatusTextFromCode($status){

	if($status==0)
		return "Issued";
	else if($status==1)
		return "Returned";
	else
		return "Un-kown";

}




function getStatusButtonFromCode($status,$book_id,$issue_id){

	
	//$str = '<form action="POST" >';
	//$str = '';
	//$str = '<button value="Return">Test</button>';
	//$str += '</form>';
	//$str += '<button value="Return">Return</button>';
	//return $str;
	$str = '';
	if($status==0){
		$str = '<input type="text" name="issue_id" value="'.$issue_id.'" hidden/>
		<input type="text" name="book_id" value="'.$book_id.'" hidden/>
		<input type="submit" name="return" value="Return" class="btn btn-sm btn-warning w-100"></input>';
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="iframe_body">
<center>
<h2 class="view_issue"><input type="button" name="stuview" value="Student"><input type="button" name="facview" value="Faculty"></h2>

<?php 
//echo "helloooo ".$_POST["issue_id"];
if (isset($_POST["return"]) && isset($_POST["issue_id"])){
	$sql = "UPDATE book_issue SET issue_status=1 WHERE issue_id=".$_POST["issue_id"].";";
	//echo "<h2>sql </h2> ".$sql;
	if ($conn->query($sql) === TRUE) {
		$sql = "UPDATE books SET book_quantity=book_quantity+1 WHERE id=".$_POST["book_id"].";";
		$conn->query($sql);
		//echo "<h2>Password Changed successfully</h2>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}		
}

$book_issue_table="book_issue";
$sql = "SELECT book_issue.issue_status as issue_status,

book_issue.issue_date as issue_date,

ADDDATE(book_issue.issue_date , 30) as last_date,
book_issue.issue_id as issue_id,
books.id as book_id,
 books.book_name as book_name,
 users.user_id as user_id,
 users.user_name as user_name,
 department.dep_name as dep_name

 
  FROM book_issue LEFT JOIN books ON book_issue.book_id=books.id " .
"LEFT JOIN (users LEFT JOIN department ON users.department=department.id) ON book_issue.user_id=users.user_id where book_issue.issue_status=0";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
?>
<h2 class="m-3">Issued Books</h2>
<table class="table">
<thead class="thead-dark">
	<tr>
		<th scope="col">Book ID</th>
		<th scope="col">Book Name</th>
		<th scope="col">User ID</th>
		<th scope="col">User Name</th>
		<th scope="col">Issue Date</th>
		<th scope="col">Last Date</th>
		<th scope="col">Status</th>
		<th scope="col">Action</th>
	</tr>

	<?php 

	
	while($row = $result->fetch_assoc()) {
		echo '<form method="POST">';
echo "<tr><td>" . $row["book_id"]. "</td><td>". $row["book_name"]. "</td><td>"
. $row["user_id"]. "</td><td>". $row["user_name"]. "</td><td>"
 . $row["issue_date"]. "</td>". "<td>"
 . $row["last_date"]. "</td>". "<td>"
.getStatusTextFromCode($row["issue_status"]). "</td><td>"
.getStatusButtonFromCode($row["issue_status"],$row["book_id"],$row["issue_id"]). "</td>". "</tr>";
}
echo '</form>';


?>

</tbody>
</table>
<?php

//echo $result->num_rows;
} else {
	
	echo '<h3  class="m-3">No books are issued !</h3>';
} ?>
</center>
</body>
</html>