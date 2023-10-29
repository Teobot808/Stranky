<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
     <!-- Top navigation -->
<div class="topnav">

    <!-- Centered link -->
    <div class="topnav-centered">
      
    </div>
  
    <!-- Left-aligned links (default) -->
    <a href="index.html" class="active">Home</a>
    <div class="topnav-greenpower">
        <a href="Greenpower_page.html">Greenpower</a>
    </div>
    
    <a href="something.php">Something</a>
   
    <!-- Right-aligned links -->
    <div class="topnav-right">
      <a href="About.html">About</a>
      <a href="loginpage.html">Login</a>
    </div>
  
  </div>
</head>
<body>
    <h1>Something page</h1>

    <p>This page provides dynamicaly generated content loaded from SQL database.</p>

    <?php
    // Establish a database connection (similar to the previous script)
    $db = new mysqli('localhost', 'Teo', '1234', 'teo');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

/* File path to insert
$file_path = '/path/to/your/file';
    // Retrieve file paths from the database
    $sql = "SELECT file_path FROM file_paths";
$result = $db->query($sql);
*/
$sql = "SELECT obrazok_test FROM users";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $file_path = $row['obrazok_test'];
        // Use $file_path for dynamic content generation
        $file_path_encoded = urlencode($file_path);
    }
} else {
    echo "No file paths found in the database.";
}
echo "<img src='$file_path_encoded' alt='Image'>";

$db->close();
?>
    <!--<img src="vlk.jpg" alt="Image2"> -->
  </body>
</html>