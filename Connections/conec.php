
<?php
$servername = "localhost";
$dbname = "feseor5_eventos";
$username = "feseor5_fese";
$password = "Fs666AdQe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");
?>