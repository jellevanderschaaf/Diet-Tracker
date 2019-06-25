<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "diet_tracker");

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>