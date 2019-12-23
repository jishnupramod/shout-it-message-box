<?php
    include 'database.php';

    // Validate submission
    if(isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($conn, $_POST['name']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        date_default_timezone_set('America/New_York');
        $time = date('h:i:s', time());

        // Validate inputs
        if(!isset($user) || $user == '') {
            $error = "Please fill in your Name";
            header("Location: index.php?error=" . urlencode($error));
            exit();
        }
        elseif(!isset($message) || $message == '') {
            $error = "Please fill in the Message";
            header("Location: index.php?error=" . urlencode($error));
            exit();
        }
        else {
            $query = "INSERT INTO shouts (user, message, time)
            VALUES ('$user', '$message', '$time')";

            if(!mysqli_query($conn, $query))
                die("Error" . mysqli_error($conn));
            else {
                header("Location: index.php");
                exit();
            }
        }

    }
?>
