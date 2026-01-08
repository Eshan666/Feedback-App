<?php include 'inc/header.php'; ?>
<?php include 'config/database.php'; ?>
<?php
//echo $_SESSION['name'];

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

$fetchSql = "SELECT * FROM `feedbacks`";

$allRows = mysqli_query($conn, $fetchSql);

// if (mysqli_num_rows($allRows) > 0){
//     while($row = mysqli_fetch_assoc($allRows)){

//         if(str_contains( $row['email'] , "gmail" )){
//             continue;
//         }
//         echo "<h1> {$row['email']} </h1> <br>";
//     }



// };

$data = [];

while($row = mysqli_fetch_assoc($allRows)){
    $data [] = $row;
}
?>
<div class="container">
    <div class="list-group">
        <?php foreach ($data as $value): ?>
 
    <?php if(str_contains($value['email'], "gmail")):?>
    <?php continue; ?>
    <?php elseif(!str_contains($value['email'], "gmail")):?>
    <?php echo "<a href='#' class='list-group-item list-group-item-action mb-2' aria-current='true'>
      <div class='d-flex w-100 justify-content-between'>
        <h5 class='mb-1'>{$value['name']}</h5>
        <small>{$value['date']}</small>
      </div>
      <p class='mb-1'>{$value['message']}</p>
      <small>{$value['email']}</small>
    </a>"; ?>
    <?php endif; ?>

<?php endforeach; ?>

    </div>
    

</div>


<?php include("inc/footer.php");?>



