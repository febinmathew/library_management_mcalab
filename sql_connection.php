 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "library_cet";

$table_books="books";
$t_books_name="name";

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?> 
