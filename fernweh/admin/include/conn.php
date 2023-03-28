<?php
$servername = "localhost";
$dbname = 'fernweh';
$username = "root";
$password = "";
$con = new mysqli($servername, $username, $password, $dbname);

if (!$con) {
    die(mysqli_error($con));
}
?>