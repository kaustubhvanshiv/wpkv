<?php
$servername = "localhost";  // Use your DB server (e.g., 127.0.0.1 or localhost)
$username = "root";         // Default for XAMPP/WAMP
$password = "";             // Default for XAMPP (no password)
$dbname = "studentDB";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created or exists already.<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// SQL to create table
$table = "CREATE TABLE IF NOT EXISTS studentRecords (
    rollNo INT PRIMARY KEY,
    studName VARCHAR(100) NOT NULL,
    studDept VARCHAR(50) NOT NULL,
    passingYear YEAR NOT NULL,
    classGrades ENUM('First Class', 'Second Class', 'Pass') NOT NULL
)";

if ($conn->query($table) === TRUE) {
    echo "Table 'studentRecords' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
