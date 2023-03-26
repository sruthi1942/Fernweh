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
            <div class="container justify-content-center">
                <h2>Create Post</h2>
                <form method="post" class="row g-3" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Title</label>
                        <input type="text" class="form-control" id="inputEmail4" name="title" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Location</label>
                        <input type="text" class="form-control" id="inputCity" name="location" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" class="form-select" name="category"required>
                        <option selected value="entertainment">Food</option>
                        <option value="Science">Science and Technology</option>
                        <option value="romance">Entertainment</option>
                        </select>
                    </div>
                   <div class="input-group mb-3 col-md-12">
                        <input type="file" class="form-control" id="inputGroupFile02" accept="image/*" name="image" required>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content" required></textarea>
                        <label for="floatingTextarea"></label>
                    </div>
                       
                    <button type="submit" name="submit" class="btn btn-primary">Make Post</button>
                </form>
            </div>
            <script type="text/javascript">
 
               CKEDITOR.replace( 'content' );
                
            </script>
        </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sticky-lg-bottom text-dark text-center">© company name 2023. All rights reserved.</div>
  </main>
</body>
</html>