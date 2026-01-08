<?php include 'inc/header.php'; ?>
<?php include 'config/database.php'; ?>
<?php
echo $_SESSION['name'];

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
<?php foreach ($data as $value): ?>
<li> 
    <?php if(str_contains($value['email'], "gmail")):?>
    <?php echo $value['email']; ?>
    <?php elseif(!str_contains($value['email'], "gmail")):?>
    <?php echo "{$value['email']} without gmail"; ?>
    <?php endif; ?>
</li>
<?php endforeach; ?>



