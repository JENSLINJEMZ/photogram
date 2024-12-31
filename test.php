<?php 

$username = 'username';
$password = 'password';
$email = 'email@test.com';
$number = '1234567890';

// Print the values for testing
echo "username: " . $username . "<br>";
echo "password: " . $password . "<br>";
echo "email: " . $email . "<br>";
echo "number: " . $number . "<br>";


// Database connection details
$servername = "mysql.selfmade.ninja";
$username = "jemz_DB";
$password = "@1234Jemz";
$dbname = "jemz_DB_user_data";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$user_input = 'jemz';
$pass_input = '@jemzpass';

// Prevent SQL Injection
// $user_input = $conn->real_escape_string($user_input);
// $pass_input = $conn->real_escape_string($pass_input);

// Query to check user credentials
$sql = "SELECT * FROM users WHERE username = '$user_input' AND password = '$pass_input'";
$result = $conn->query($sql);

// Check if the query returns any rows
if ($result->num_rows > 0) {
    // If a match is found
    echo "Login Success!";
} else {
    // If no match is found
    echo "Invalid username or password.";
}

// Close the database connection
$conn->close();

