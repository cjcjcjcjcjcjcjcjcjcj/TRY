<?php
    $conn = mysqli_connect('localhost', 'root', '', 'capstone');
   
    // Check if the connection was successful
    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>  