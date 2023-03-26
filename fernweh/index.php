<?php

include "includes/db_conn.php";

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

    <?php include "includes/navigation.php";?>
    <!--END NAVIGATION BAR--->

    <div class="container-fluid pt-3">
        <div class="row gx-3">
                <div class="col-md-6 img-1"></div>
                <div class="col-md-6">
                    <h1 class="fs-2 text-center fw-bolder">
                        Top choice destionations
                    </h1>
                    <div>
                        <p class="fs-3">We bring you the most preferred destionations of tourists and all you need to know about them.</p>
                        <p class="fs-3">Logistics and accomodation? We got you covered. Read our articles and make your choices worth every penny.</p>
                    </div>
                </div>
        </div>
       
        <div class="row">
                <div class="d-flex justify-content-center mt-4 bg-secondary" ><p class="me-3 fs-2 text-light">Share your story with us</p><button class="btn btn-lg btn-primary"><a href="signup.php" class="text-decoration-none text-white">Become a storyteller</a></button></div>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col mx-auto">
                    <h6 class="text-primary"></h6>
                    <h1>Latest Stories</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                        in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut
                    </p>
                </div>
            </div>
        
            <div class="row text-center g-4">
                <?php
                
                                            $sql = "SELECT * FROM post ORDER BY RAND() LIMIT 3";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row = mysqli_fetch_assoc($result))
                                                {   $sql2 = "SELECT fname,lname from tellers where tell_id = $tell_id ";
                                                    $result2 = mysqli_query($conn, $sql2);
                                                    $row = mysqli_fetch_assoc($result2);

        
                                        ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="./storyteller/images/<?php echo $image;?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><?=$post['title'];?></h4>
                            <p class="card-text"><?=$row['fname'] .' '. $row['lname'];?></p>
                            <a href="<?php echo 'read.php?view_id= '.$id.'; '?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <?php
                                                }
                                            }
        
                                        ?>
            </div>
        </div>
        </div>
        
    </div>



<div class="sticky-lg-bottom text-dark text-center">©2023. All rights reserved.</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>

</html>