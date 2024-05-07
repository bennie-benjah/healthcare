<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection (replace these values with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "healthcare";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check if the user exists and the password is correct
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated successfully
        $_SESSION["authenticated"] = true; // Set user as authenticated
        header("Location: ../index.php");
        exit();
    } else {
        // Authentication failed
        echo "<script>alert('No user found with such credentials'); window.location.href = '../sign-in.html';</script>";
    }

    // Close connection
    $conn->close();
}
