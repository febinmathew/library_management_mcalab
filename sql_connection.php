 <?php
$servername = "localhost";
$username = "root";
$password = "cetmca";

$table_books="books";
$t_books_name="name";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?> 
