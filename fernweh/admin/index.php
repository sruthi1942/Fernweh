<?php
session_start();
include 'include/conn.php';

if (isset($_POST['submit'])) {
    
    $username = strip_tags($_POST['username']); 
    $password = strip_tags($_POST['password']);


if (empty($username)) {
    header("Location: index.php?error=Username is required");
    exit();
} else if (empty($password)) {
    header("Location: index.php?error=Password is required");
    exit();
}

$password = md5($password);
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $username && $row['password'] === $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header("Location:dashboard.php");
        exit();
    } else {
        header("Location: index.php?error=Incorrect username or password");
        exit();
    }
} else {
    header("Location: index.php?error=Incorrect username or password");
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
    <title>Admin Login</title>
</head>

<body>
   
    <div class="col-md-8 mx-auto text-center">
        <h6 class="text-primary"></h6>
        <h1></h1>
    </div>
        <div class="row">
            <div class="container col-md-5 mt-5">
                <p class="fs-3 fw-bolder">Admin Login</p>
                <form method="post">
                    <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="alert alert-danger" role="alert"> <?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" autocomplete="off" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" autocomplete="off" name="password" class="form-control" id="exampleInputPassword1">
                        
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Sign in</button></div>
                </form>
            </div>
        </div>
</body>

</html>