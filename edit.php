<?php include 'config/database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php 
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

if($conn){
    //echo "DB connected!";
}
?>

<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM feedbacks WHERE id = $id";
    echo $id;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['name'];
            $email = $row['email'];
            $message = $row['message'];

            echo $name;
            echo $email;
            echo $message;

        }
    }
}
?>
<?php 
$_SESSION['status'] = false;
if(isset(($_SESSION['status'])) && $_SESSION['status'] == true ) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Successfully Edited!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
?>


<!--Form Starts-->
<form method = "POST">
<div class="container sm-12 lg-3">
    <div class="mb-2">
    
      <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="name" class="form-control" name="name" id="exampleFormControlInput1" placeholder="John Doe" value= "<?php echo $name; ?>">
</div>

<div class="mb-2">
  <label for="exampleFormControlInput2" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" id="exampleFormControlInput2" placeholder="name@example.com" value= "<?php echo $email; ?>">
</div>

<div class="mb-2">
  <label for="exampleFormControlTextarea3" class="form-label">Your feedback</label>
  <textarea class="form-control" name = "message" id="exampleFormControlTextarea3" rows="3"><?php echo htmlspecialchars($message); ?></textarea>
</div>
<button type="submit" name="edit" class="btn btn-info">Submit</button>

</div>
</form>



<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){

$name = $_POST['name'];

$email = $_POST['email'];

$message=$_POST['message'];

$updateSQL = "UPDATE feedbacks SET name = '$name', email = '$email',message = '$message' WHERE id = $id";

mysqli_query($conn, $updateSQL);


$_SESSION['status'] = true;

//echo "<script>alert('Successfully Edited!')</script>";



}

?>




