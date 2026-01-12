<?php include 'config/database.php'; ?>
<?php 
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

if($conn){
    //echo "DB connected!";
}



if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM feedbacks WHERE id = $id";

    $result = mysqli_query($conn, $sql);
    header('location: submissions.php');
    
}

?>