<?php

include "include/conn.php";

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

     <h1 class="visually-hidden">Heroes examples</h1>

  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="images/1.jpeg" alt="" width="850" height="550">
    <h1 class="display-5 fw-bold">Welcome</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Bringing you amazing sceneries and scintilating stories first hand by our award winning writers </p>
      
    </div>
  </div>
        
            <div class="row text-center g-4 bg-#efefef">

            <p class="fs-3 fw-bold" >Our Latest Stories</p>
                <?php
                
                                            $sql = "SELECT * FROM post ORDER BY RAND() LIMIT 3";
                                            $result = mysqli_query($con, $sql);
                                            if($result){
                                                while($post = mysqli_fetch_assoc($result))
                                                {

                                                $tell_id = $post['teller_id'];
                                                   $sql2 = "SELECT fname,lname from tellers where teller_id = $tell_id ";
                                                    $result2 = mysqli_query($con, $sql2);
                                                    $row = mysqli_fetch_assoc($result2);
                                                    $id = $post['id'];
        
                                        ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="./storyteller/image/<?=$post['image'];?>" class="card-img-top" alt="..." height="177" width="285">
                        <div class="card-body">
                            <h4 class="card-title"><?=$post['title'];?></h4>
                            <p class="card-text"><?=$row['fname'] .' '. $row['lname'];?></p>
                            <a href="<?php echo 'read.php?view_id='.$id.' ';?>" class="btn btn-primary">Read more</a>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>

</html>