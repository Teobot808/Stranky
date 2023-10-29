<?php
$servername = "localhost";
$username = "Teo";
$password = '1234';
$database = 'teo';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get entered user credentials
print_r($_POST);
if ($_POST['username'] != "") {
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
} else {
    die("Please enter username");
}
print_r($user);

//$pass = $_POST['password'];
if ($_POST['password'] != "") {
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
} else {
    die("Please enter password");
}
print_r($pass);

// read data
$sql = "SELECT * FROM users WHERE name='{$user}'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  print_r($row);
  if ($row['password'] == $pass) {
    print("Welcome {$row['name']}");
  }
  else {
    print("Access denied");
  }
} else {
  print "No such user";
}

mysqli_close($conn);