 <?php
$servername = "localhost";
$username = "root";
$password = "cetmca";
$tablename_books="books";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?> 
