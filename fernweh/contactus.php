<?php

include "include/conn.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $msg = strip_tags($_POST['message']);

    $email = htmlspecialchars(mysqli_real_escape_string($con, $email));
    $msg = htmlspecialchars(mysqli_real_escape_string($con, $msg));

    $sql = "INSERT INTO contact (email, message) VALUES ('$email', '$msg')";
    $result = mysqli_query($con, $sql);
        if ($result) 
        {
                $showAlert = true;
                header("Location: contactus.php?msgsuccess=true");
                exit();
                }
            else {
                $showError = "Process Failed try again";
                header("Location: contactus.php?error=$showError");
                exit();
                }

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

    <div class="container pt-3">
        <div class="row gx-3">
                <p class="fs-3 fw-bold">Leave us a message</p>

                <form method="post">
                    <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php
                        if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
                            echo '<p class="alert alert-success" role="alert">Message sent!!</p>';
                        }
                    ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" autocomplete="off" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" required name="message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">leave a comment here...</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
        </div>
        
    </div>



<div class="sticky-lg-bottom text-dark text-center">© Fernweh 2023. All rights reserved.</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>

</html>