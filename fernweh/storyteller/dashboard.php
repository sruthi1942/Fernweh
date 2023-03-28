<?php
session_start();
include 'include/conn.php';

$id = $_SESSION['id'];

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    
    $sql = "DELETE FROM post where id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: dashboard.php?deletesuccess=true");
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
    <title>Dashboard|Home</title>
    
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
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
            <?php
    
                $sql = "SELECT * FROM post where teller_id = $id";
                $result = mysqli_query($con, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['id'];
                        $title = $row['title'];
                        $content = substr($row['content'],0,20);
                        $content = strip_tags($content);
                        echo '
                        <tr>
                            <th scope="row">'.$id.'</th>
                            <th scope="row">'.$title.'</th>
                            <td>'.$content.'</td>
                            <td>
                                <button class="btn btn-primary me-3"><a href="edit.php?edi_id='.$id.'" class="text-light" style="text-decoration:none;">Edit</a></button >
                                <button class="btn btn-primary me-3"><a href="readpost.php?view_id='.$id.'" class="text-light" style="text-decoration:none;">View</a></button>
                                <button class="btn btn-danger"><a href="dashboard.php?del_id='.$id.'" class="text-light" style="text-decoration:none;">Delete</a></button>
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
    
    <div class="sticky-lg-bottom text-dark text-center">©Fernweh 2023. All rights reserved.</div>
  </main>
</body>
</html>