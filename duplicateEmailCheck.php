<?php include 'config/database.php' ?>
<?php
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

if($conn){
    echo "DB Connected!";
}

$sql = "SELECT *
FROM feedbacks
WHERE email = 'bob@gmail.com'";

$result=  mysqli_query($conn, $sql);
var_dump($result);

if(mysqli_num_rows($result) > 0 ){
    echo "email found!";
}
else{
    echo "No email found!";
}




?>