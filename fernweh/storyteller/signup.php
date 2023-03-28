<?php

include 'include/conn.php';

if (isset($_POST['submit'])) {
    
    $fname = strip_tags($_POST['first']);
    $lname = strip_tags($_POST['last']);
    $email = strip_tags($_POST['email']);
    $gender = strip_tags($_POST['gender']);
    $password = md5(strip_tags($_POST['password']));
    $cpassword = md5(strip_tags($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    

    $fname = htmlspecialchars(mysqli_real_escape_string($con, $fname));
    $lname = htmlspecialchars(mysqli_real_escape_string($con, $lname));
    $password = htmlspecialchars(mysqli_real_escape_string($con, $password));
    $cpassword = htmlspecialchars(mysqli_real_escape_string($con, $cpassword));
    $image = htmlspecialchars(mysqli_real_escape_string($con, $image));
    $email = htmlspecialchars(mysqli_real_escape_string($con, $email));
    $gender = htmlspecialchars(mysqli_real_escape_string($con, $gender));
    
    if ($password != $cpassword) {
        $showError = "Passwords do not match";
        header("Location: signup.php?signupsuccess=false&error=$showError");
        exit();
    } else {
        
            $sql = "SELECT * FROM tellers WHERE  email = '$email'";
            $result = mysqli_query($conn, $sql);
         
          if(!$result || mysqli_num_rows($result) == 0)  {
                 move_uploaded_file($image_temp, "image/$image");
                $sql = "INSERT INTO tellers (fname, lname, email, password, gender,image) VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$image')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showAlert = true;
                    header("Location: login.php?signupsuccess=true");
                    exit();
                }
                
            } else {
                    $showError = "Email already exists";
                    header("Location: signup.php?signupsuccess=false&error=$showError");
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
    <title>Sign </title>
</head>

<body>
    <?php include "includes/navigation.php"?>
    <!--END NAVIGATION BAR--->
    <div class="col-md-8 mx-auto text-center">
        <h6 class="text-primary"></h6> 
    </div>
    <div class="row">
        <div class="container col-md-5 mt-5">
            <p class="fs-3 fw-bolder">Teller Sign up</p>
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="mb-3 colmd-6">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first" id="exampleInputEmail1" required aria-describedby="emailHelp">

                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="email" class="form-control" name="last" required id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="col-md-6">
                        <label for="inputState" class="form-label">Gender</label>
                        <select id="inputState" class="form-select" name="gender">
                        <option selected>Choose...</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="other">other</option>
                        </select>
                    </div>

                <div class="mb-3 col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control"  required name="password" id="exampleInputPassword1">
                    
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
                    
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <input type="file" name="image" class="form-control" id="inputGroupFile01">
                </div>

                <div class="d-flex justify-content-between">
                    <p>Have an account? <a href="signin.php">Sign in.</a></p> <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
                </div>
            </form>
            
        </div>
    </div>
</body>

</html>

<form action="author_register.php" class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="fname" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputPassword4" name="lname" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="psw" required>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputAddress" placeholder="re-type password" name="confirmPsw" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Country</label>
                        <input type="text" class="form-control" id="inputCity" name="country" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Gender</label>
                        <select id="inputState" class="form-select" name="gender">
                        <option selected>Choose...</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="other">other</option>
                        </select>
                    </div>
                    
                   
                    <div class="d-flex justify-content-between">
                        <span>Already have an account? <a href="login.php">Login here.</a></span>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>