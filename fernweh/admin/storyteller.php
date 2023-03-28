<?php
session_start();
include 'include/conn.php';
$user_id = $_SESSION['id'];

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    
    $sql = "DELETE FROM tellers where teller_id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: storyteller.php?deletesuccess=true");
        exit(0);
        } 
        else {
            die(mysqli_error($conn));
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
    <title>Storytellers</title>
    
</head>
<body>
    <main>
        
        <div class="d-flex"> 
          <?php include 'include/sidebar.php';?>

            <table class="table table-striped table-hover">
              
            <thead>
                <p><?php
                        if (isset($_GET['deletesuccess']) && $_GET['deletesuccess'] == "true") {
                            echo '<p class="alert alert-success" role="alert">Delete successful!</p>';
                        }
                    ?></p>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
            <?php
    
                $sql = "SELECT * FROM tellers";
                $result = mysqli_query($con, $sql);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['teller_id'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $email = $row['email'];
                        $image = $row['image'];
                        
                        
                        echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$fname.'</td>
                             <td>'.$lname.'</td>
                              <td>'.$email.'</td>
                               <td><img src="../storyteller/image/'.$image.'"style="width:50px; border-radius:50%;"/></td>
                            
                            <td>
                                <a href="storyteller.php?del='.$id.'"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
    
    <div class="sticky-lg-bottom text-dark text-center">©  Fernweh All rights reserved.</div>
  </main>
</body>
</html>