<?php include("inc/header.php");?>
<?php include "config/database.php"?>

<!--Form Starts-->
<form action="" method = "POST">
<div class="container sm-12 lg-3">
    <div class="mb-2">
    
      <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="name" class="form-control" name="name" id="exampleFormControlInput1" placeholder="John Doe">
</div>

<div class="mb-2">
  <label for="exampleFormControlInput2" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" id="exampleFormControlInput2" placeholder="name@example.com">
</div>

<div class="mb-2">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" name = "text" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>

</div>
    </form>
  
<?php
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_database);

if( $_SERVER["REQUEST_METHOD"] === "POST" ){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $text = $_POST['text'];

  if(strlen($name) < 3){
//     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//   <strong>Holy guacamole!</strong> 
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';

echo '<script>alert("please use a valid name with more than 2 characters!")</script>';
    die();
  
  }

  if(empty($email) || empty($text)){
    echo "<script>alert('password or message cannot be empty!')</script>";
    die();
  }


$checkDuplicateEmail = "SELECT *
FROM feedbacks
WHERE email = '$email'";

 $emailResult =  mysqli_query($conn, $checkDuplicateEmail);

 if(mysqli_num_rows($emailResult) > 0){
   echo "<script>alert('Duplicate Email Found!')</script>";
   die();
 }

 $_SESSION['name'] = $name;
 $_SESSION['email'] = $email;





  $sql = "INSERT INTO `feedbacks` (`id`, `name`, `email`, `message`, `date`) 
  VALUES (NULL, '$name', '$email', '$text', current_timestamp())";

  mysqli_query($conn, $sql);
  echo "<script>alert('Data Inserted Successfully')</script>";

  
}

?>


<!--Form Ends-->

<?php include("inc/footer.php");?>
 
    
