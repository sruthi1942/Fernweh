<?php
session_start();
include 'include/config.php';
if (isset($_GET['view_id'])) {
    $id = $_GET['view_id'];
    
    
    $query = "SELECT * FROM posts WHERE post_id=$id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['post_image'];
        $title = $row['post_title'];
        $create_date = $row['post_date'];
        $content = $row['post_content'];
        } 
        else {
            die(mysqli_error($conn));
        }
    }


?>
<?php
session_start();
include 'includes/db_conn.php';

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
                            					<div class="col-md-12">
                                					<img src="./writer/imagePost/<?php echo htmlentities($row['post_image']);?>" width="50" height="50" alt="">
                            					</div>
                            					<div class="col-md-12">
                                					<p><?php echo htmlentities($row['post_title']);?></p>
                            					</div>
                        						<div class="col-md-12">
                            						<?php echo htmlentities($row['post_content']);?>
                        						</div>
                        					</div>
                    </div>
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">©2023. All rights reserved.</div>
  </main>
</body>
</html>