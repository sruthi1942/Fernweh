<?php
session_start();
include 'include/conn.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Dashboard|Home</title>
    <style>
        .active2{
            background-color:#337ab7;
            border-color:#337ab7;
        }
    </style>
</head>
<body>
    <main>
        
        <div class="d-flex"> 
          <?php include 'includes/sidebar.php';?>
            <div class="container">
                        <div class="row">
                                <?php
        
                                    $sql = "SELECT * FROM post";
                                    $result = mysqli_query($con, $sql);
                                    if($result){
                                        while($post = mysqli_fetch_assoc($result))
                                        {   $tell_id = $post['teller_id'];
                                            $id = $post["id"];
                                            $image = $post["image"];
                                            $sql2 = "SELECT fname,lname from tellers where tell_id = $tell_id ";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row = mysqli_fetch_assoc($result2);

                                        ?>
                                        <div class="col-md-4">
                                                <div class="card" style="width: 18rem;">
                                                    <img src="./storyteller/image/<?php echo $image;?>" height="150" width="150" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?=$post['title'];?></h5>
                                                        <h6 class="card-title"><?=$row['fname'] .' '. $row['lname'];?></h6>
                                                        <p class="card-text"><?=substr($post['content'],0,20);?> ...</p>
                                                        <a href="<?php echo 'read.php?view_id= '.$id.'; '?>" class="btn btn-primary">Read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                    else{
                                        echo "No Post found";
                                    }

                                ?> 
                            
                        </div>
                        
                    </div>
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">©2023. All rights reserved.</div>
  </main>
</body>
</html>