<?php
session_start();
include 'include/conn.php';

if (isset($_POST['submit'])) {
    
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    


if (empty($email)) {
    header("Location: signin.php?error=Email is required");
    exit();
} else if (empty($password)) {
    header("Location: signin.php?error=Password is required");
    exit();
}

$password = md5($password);
$sql = "SELECT * FROM tellers WHERE email='$email' AND password='$password'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] === $email && $row['password'] === $password) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['teller_id'];
        header("Location:dashboard.php");
        exit();
    } else {
        header("Location: signin.php?error=Incorrect Email or password");
        exit();
    }
} else {
    header("Location: signin.php?error=Incorrect Email or password");
    exit();
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
    <title>Sign In</title>
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
            
            <p class="fs-3 fw-bolder">Teller Sign in</p> <p><a href="..storyteller/"></a></p>
            <form method="post" enctype="multipart/form-data">
                <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php
                        if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
                            echo '<p class="alert alert-success" role="alert">Signup successful!</p>';
                        }
                    ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" autocomplete="off" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" autocomplete="off" class="form-control"  name="password" id="exampleInputPassword1">
                    
                </div>
                <

                <div class="d-flex justify-content-between">
                    <p>Do not have an account? <a href="signup.php">Sign up.</a></p> <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
    <div class="sticky-lg-bottom text-dark text-center">© Fernweh All rights reserved.</div>
</body>

</html>