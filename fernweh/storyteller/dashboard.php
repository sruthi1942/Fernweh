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

            <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
            <?php
    
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['post_id'];
                        $title = $row['post_title'];
                        $content = substr($row['post_content'],0,100);
                        $content = strip_tags($content);
                        echo '
                        <tr>
                            <th scope="row">'.$id.'</th>
                            <th scope="row">'.$title.'</th>
                            <td>'.$content.'</td>
                            <td>
                                <button class="btn btn-primary me-3"><a href="edit.php?updt_id='.$id.'" class="text-light" style="text-decoration:none;">Edit</a></button >
                                <button class="btn btn-primary me-3"><a href="view_story.php?view_id='.$id.'" class="text-light" style="text-decoration:none;">View</a></button>
                                <button class="btn btn-danger"><a href="delete_story.php?del_id='.$id.'" class="text-light" style="text-decoration:none;">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
            
            ?> 
            </tbody>
          </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© company name 2023. All rights reserved.</div>
  </main>
</body>
</html>