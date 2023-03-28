<?php

include "include/conn.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $msg = strip_tags($_POST['message']);

    $sql = "INSERT INTO contact (email, message) VALUES ('$email', '$msg')";
    $result = mysqli_query($conn, $sql);
        if ($result) 
        {
                $showAlert = true;
                header("Location: contactus.php?signupsuccess=true");
                exit();
                }
            else {
                $showError = "Process Failed try again";}

            } else{
                echo "";
            }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>

   <?php include "include/navigation.php";?>
    <!--END NAVIGATION BAR--->

    <div class="container-fluid pt-3">
        <div class="row gx-3">
                <p>Leave us a message</p>

                
            </div>
        </div>
        </div>
        
    </div>



<div class="sticky-lg-bottom text-dark text-center">©2023. All rights reserved.</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>

</html>