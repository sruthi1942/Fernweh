<?php
session_start();
include 'include/conn.php';
$user_id = $_SESSION['id'];

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    
    $sql = "DELETE FROM post where id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: posts.php?deletesuccess=true");
        exit(0);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Posts</title>
    
</head>
<body>
    <main>
        
        <div class="d-flex"> 
          <?php include 'include/sidebar.php';?>

            <table class="table table-striped table-hover">
              <?php
                        if (isset($_GET['deletesuccess']) && $_GET['deletesuccess'] == "true") {
                            echo '<p class="alert alert-success" role="alert">Delete successful!</p>';
                        }
                    ?>
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Date Posted</th>
                <th scope="col">Location</th>
                <th scope="col">Category</th>
                <th scope="col">Last Update</th>
                <th scope="col">Author</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
            <?php
    
                $sql = "SELECT * FROM post";
                $result = mysqli_query($con, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['id'];
                        $title = $row['title'];
                        $content = substr($row['content'],0,20);
                        $postDate = $row['post_date'];
                        $location = $row['location'];
                        $category = $row['category'];
                        $updated = $row['update'];
                        

                        $sql2 = "SELECT * FROM tellers where teller_id = $id";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                          $fname = $row2['fname'];
                          $lname = $row2['lname'];
                        echo '
                        <tr>
                            <th>'.$id.'</th>
                            <th>'.$title.'</th>
                            <td>'.$content.'</td>
                             <td>'.$postDate.'</td>
                              <td>'.$location.'</td>
                               <td>'.$category.'</td>
                               <td>'.$fname.' '.$lname.'</td>
                            <td>
                              <a href="editPost.php?edit='.$id.'&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                <a href="deletestory.php?del_id='.$id.'"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                            <td>
                        </tr>';
                    }
                }
            
            ?> 
            </tbody>
          </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
   <div class="sticky-lg-bottom text-dark text-center">© Fernweh All rights reserved.</div>
  </main>
</body>
</html>