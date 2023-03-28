<?php
session_start();
include 'include/conn.php';

if (isset($_GET['view_id'])) {
    $id = $_GET['view_id'];
    
    
    $query = "SELECT * FROM post WHERE id=$id";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        $title = $row['title'];
        $create_date = $row['post_date'];
        $content = $row['content'];
        } 
        else {
            die(mysqli_error($con));
        }
    }


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Dashboard| Story</title>
    
</head>
<body>
    <main>
        
        <div class="d-flex"> 
          <?php include 'include/sidebar.php';?>
            <div class="container">
                        <div class="row">
                            					<div class="col-md-12">
                                					<img src="image/<?php echo htmlentities($row['image']);?>" width="350" height="350" alt="">
                            					</div>
                            					<div class="col-md-12">
                                					<p><?php echo $title;?></p>
                            					</div>
                        						<div class="col-md-12">
                            						<?php echo $content;?>
                        						</div>
                        					</div>
                    </div>
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© Fernweh All rights reserved.</div>
  </main>
</body>
</html>