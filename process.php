<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insecurely hash the password using md5
    $hashed_password = md5($password);

    // Insert user into database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>User Registered</h1>";
        echo "<p>Username: $username</p>";
        echo "<p>Hashed Password: $hashed_password</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
