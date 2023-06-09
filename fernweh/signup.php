<?php
session_start();
include 'include/conn.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if ($password != $cpassword) {
        $showError = "Passwords do not match";
        header("Location: signup.php?signupsuccess=false&error=$showError");
        exit();
    } else {
        if (!empty($email) && !empty($password)) {
            $sql = "SELECT * FROM seekers WHERE email = '$email'";
            $result = mysqli_query($con, $sql);
            if(!$result || mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO seekers (email, password) VALUES ('$email', '$password')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showAlert = true;
                    header("Location: signin.php?signupsuccess=true");
                    exit();
                }
                
            } else {
                $showError = "Email already exists";
                header("Location: signup.php?error=$showError");
                exit();
            }
        } else {
            $showError = "Some fields are empty";
            header("Location: signup.php?error=$showError");
            exit();
        }
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <?php include "include/navigation.php"?>
    <!--END NAVIGATION BAR--->
    <div class="col-md-8 mx-auto text-center">
        <h6 class="text-primary"></h6>
        <h1></h1>
        

    </div>
    <div class="row">
        <div class="container col-md-5 mt-5">
            <p><a href="./storyteller/signin.php" class="fs-4">Teller Sign in</a></p>
            <p class="fs-3 fw-bolder">Seeker sign up</p>
            <form method="post" >
                <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" autocomplete="off" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" autocomplete="off" class="form-control"  name="password" id="exampleInputPassword1">
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" autocomplete="off" class="form-control" name="cpassword" id="exampleInputPassword1">
                    
                </div>

                <div class="d-flex justify-content-between">
                    <p>Have an account? <a href="signin.php">Sign in.</a></p> <button type="submit" class="btn btn-primary" name='submit'>Create Account</button>
                </div>
            </form>
        </div>
    </div>
    <div class="sticky-lg-bottom text-dark text-center">©Fernweh 2023. All rights reserved.</div>
</body>

</html>

