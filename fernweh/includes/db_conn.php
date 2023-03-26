<?php
$servername = "localhost";
$dbname = 'placetela';
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die(mysqli_error($conn));
}
?>