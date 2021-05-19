<?php

$servername = "localhost";
$username = "root";
$password = ""; // ADD PERSONAL PASSWORD
$dbname = "list";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS list;";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully with the name list\n";

} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";

}
// Create tables
$link = mysqli_connect($servername, $username, $password, $dbname);
mysqli_select_db($link, $dbname);

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the table task
$sql = "CREATE TABLE IF NOT EXISTS task (
    taskID int NOT NULL AUTO_INCREMENT,
    taskName VARCHAR(30) NOT NULL,
    taskDescription VARCHAR(30) NOT NULL,
    status ENUM('Complete', 'Incomplete'),
    PRIMARY KEY (taskID)
    )";

// Check if table was created
if (mysqli_query($link, $sql)) {
    echo "Table user created successfully\n";
}
else {
    echo "Error creating table: " . mysqli_error($link);
}

// Close connection
mysqli_close($conn);
mysqli_close($link);

?>
