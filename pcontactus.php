<?php
include_once('dbconnection.php');


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'finalproject';
$type = $_POST['subject'];
$message = $_POST['message'];

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have received form data and want to insert it into the 'contacts' table
if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = '';
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = '';
}

if (isset($_POST['message'])) {
    $message = $_POST['message'];
} else {
    $message = '';
}

// Prepare and execute the INSERT query
$query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($query) === true) {
    echo "Record inserted successfully.";
    header("location:messag2.html");
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>