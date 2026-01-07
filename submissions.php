<?php include("inc/header.php");?>
<?php include "config/database.php"?>
<div class="container">
  <div class="list-group">

  <?php 
  $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

  $sql = "SELECT * FROM `feedbacks`";

  $result = mysqli_query($conn, $sql);

  print_r(mysqli_num_rows($result));

  if( mysqli_num_rows($result) > 0 ){
    while($row = mysqli_fetch_assoc($result)){
      echo $row['name'];
      echo $row['email'];
      echo $row['message'];
      echo $row['date'];

      echo " <a href='#' class='list-group-item list-group-item-action' aria-current='true'>
      <div class='d-flex w-100 justify-content-between'>
        <h5 class='mb-1'>{$row['name']}</h5>
        <small>{$row['date']}</small>
      </div>
      <p class='mb-1'>{$row['message']}</p>
      <small>{$row['email']}</small>
    </a>
    ";

    }

  }
  
  ?>
  <!--
  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{$row['name']}</h5>
      <small>{$row['date']}</small>
    </div>
    <p class="mb-1">{$row['message']}</p>
    <small>{$row['email']}small>
  </a>


  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-body-secondary">3 days ago</small>
    </div>
    <p class="mb-1">Some placeholder content in a paragraph.</p>
    <small class="text-body-secondary">And some muted small print.</small>
  </a>


  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-body-secondary">3 days ago</small>
    </div>
    <p class="mb-1">Some placeholder content in a paragraph.</p>
    <small class="text-body-secondary">And some muted small print.</small>
  </a>
-->


</div>

</div>

<?php include("inc/footer.php");?>