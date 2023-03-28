<?php
session_start();
require 'include/config.php';
?>
<?php
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    
    $sql = "DELETE FROM post where id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: dashboard.php?deletesuccess=true");
        exit(0);
        } 
        else {
            die(mysqli_error($con));
        }
    }


?>

