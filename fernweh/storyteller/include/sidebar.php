
<?php
session_start();
include "include/conn.php";
$id = $_SESSION['id'];
$sql = 'select * from tellers where teller_id = $id';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$fname = $row['fname'];
$image = $row['image'];

?>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">app name</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../index.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href=""/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="dashboard.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href=""/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="write.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href=""/></svg>
          Compose
        </a>
      </li>
      
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../storyteller/image/<?=$row['image'];?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$row['fname'];?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
