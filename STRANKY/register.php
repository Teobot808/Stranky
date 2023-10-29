<?php
// Database connection details
$servername = "localhost";
$username = "Teo";
$password = '1234';
$database = 'teo';

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the registration form
/*$username = $_POST['username'];
$password = $_POST['password']; // Hash the password for security
*/

if ($_POST['username'] != "") {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
} else {
    die("Please enter username");
}
if ($_POST['password'] != "") {
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
} else {
    die("Please enter password");
}
// SQL query to insert user data into the database
$sql = "INSERT INTO users (name, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === true) {
    echo "Registration successful. <a href='login.html'>Login</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

