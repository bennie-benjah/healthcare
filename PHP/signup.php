<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeat_password = $_POST['confirmPassword'];

// Password validation
if ($password != $repeat_password) {
    // Passwords do not match, display error message
    echo "<script>alert('Passwords do not match.'); window.location.href = '../sign-up.html';</script>";

} else {
    // Insert data into database
    $sql = "INSERT INTO users (firstname, lastname, email, password)
    VALUES ('$firstname', '$lastname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Record inserted successfully, display success message
        echo "<script>alert('New record created successfully'); window.location.href = '../sign-up.html';</script>";
    } else {
        // Error occurred during insertion, display error message
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href = '../sign-up.html';</script>";
    }
}

$conn->close();
