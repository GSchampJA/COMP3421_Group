<?php 

printf($_POST['username']);
printf($_POST['password']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comp3421_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3305);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

echo "post is stored into username and password";

$sql_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

echo "sql is ready";


if (mysqli_query($conn, $sql_query) == true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);



?>
