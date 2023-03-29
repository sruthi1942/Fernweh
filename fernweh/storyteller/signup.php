<?php

include 'include/conn.php';

if (isset($_POST['submit'])) {
    
    $fname = strip_tags($_POST['first']);
    $lname = strip_tags($_POST['last']);
    $email = strip_tags($_POST['email']);
    $gender = strip_tags($_POST['gender']);
    $password = md5(strip_tags($_POST['password']));
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    

    $fname = htmlspecialchars(mysqli_real_escape_string($con, $fname));
    $lname = htmlspecialchars(mysqli_real_escape_string($con, $lname));
    $password = htmlspecialchars(mysqli_real_escape_string($con, $password));
    $image = htmlspecialchars(mysqli_real_escape_string($con, $image));
    $email = htmlspecialchars(mysqli_real_escape_string($con, $email));
    $gender = htmlspecialchars(mysqli_real_escape_string($con, $gender));
    
    if (empty($password)) {
        $showError = "Please enter password";
        header("Location: signup.php?signupsuccess=false&error=$showError");
        exit();
    } else {
        
            $sql = "SELECT * FROM tellers WHERE  email = '$email'";
            $result = mysqli_query($con, $sql);
         
          if(!$result || mysqli_num_rows($result) == 0)  {
                 move_uploaded_file($image_temp, "image/$image");
                $sql = "INSERT INTO tellers (fname, lname, email, password, gender,image) VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$image')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showAlert = true;
                    header("Location: signin.php?signupsuccess=true");
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
    <title>Sign Up</title>
</head>

<body>
    <?php include "include/navigation.php"?>
    <!--END NAVIGATION BAR--->
    <div class="col-md-8 mx-auto text-center">
        <h6 class="text-primary"></h6> 
    </div>
    <div class="row">
        <div class="container col-md-5 mt-5">
            <p class="fs-3 fw-bolder text-center">Sign up for an account</p>
            <form class="row g-3 border p-4" method="post" enctype="multipart/form-data">
                <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" autocomplete="off" class="form-control" name="first" id="exampleInputEmail1" required aria-describedby="emailHelp">

                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" autocomplete="off" class="form-control" name="last" required id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="mb-3 col-md-8">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" autocomplete="off"  name="email" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="col-md-4">
                        <label for="inputState" class="form-label">Gender</label>
                        <select id="inputState" class="form-select" required name="gender">
                        <option selected>Choose...</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="other">other</option>
                        </select>
                    </div>

                <div class="mb-3 col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" autocomplete="off" class="form-control"  required name="password" id="exampleInputPassword1">
                </div>
                    
                <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Upload profile photo</label>
                    <input type="file" name="image" required class="form-control" id="inputGroupFile01">
                </div>

                <div class="d-flex justify-content-end">
                    </p> <button type="submit" class="btn btn-primary" name="submit">Create Account</button>
                </div>
            </form>
            
        </div>
    </div>
    <div class="sticky-lg-bottom text-dark text-center">©Fernweh 2023. All rights reserved.</div>
</body>

</html>