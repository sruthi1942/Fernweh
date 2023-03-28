<?php
session_start();
include 'include/conn.php';
$id = $_SESSION['id'];

$query = "SELECT COUNT(teller_id) AS num_tellers FROM tellers";
$result = mysqli_query($con, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $tellers = $row['num_tellers'];
}

$query = "SELECT COUNT(sk_id) AS num_seekers FROM seekers";
$result = mysqli_query($con, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $seekers = $row['num_seekers'];
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
    <title>Dashboard|Home</title>
   
</head>
<body>
    <main>
        
        <div class="d-flex"> 
             <?php include 'include/sidebar.php';?>
          <div class="content">
           
              
            <div class="dasboard-content px-3pt-4">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-4">
                            <p class="text-dark bg-info fs-3 fw-bolder">Storytellers: <?php echo $tellers;?></p>    
                            </div>
                            <div class="col-md-4">
                            <p class="text-dark bg-info fs-3 fw-bolder">Story Seekers: <?php echo $seekers;?></p>    
                            </div>
                        </div>
                    </div>
              </div>
        </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© company name 2023. All rights reserved.</div>
  </main>
</body>
</html>