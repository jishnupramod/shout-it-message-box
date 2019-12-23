<?php
    // Connect to MySQL
    $conn = mysqli_connect("localhost", "root", "####", "shoutit");

    // Test the connection
    if(mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
?>
