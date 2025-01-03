<?php

$success = 0;
$user= 0;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php'; // Include your database connection file

// Check if the table exists
$table_check_query = "SHOW TABLES LIKE 'registration'";
$table_check_result = mysqli_query($con, $table_check_query);

if (mysqli_num_rows($table_check_result) == 0) {
    // Create the table if it does not exist
    $sql = "CREATE TABLE registration (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error creating table: " . mysqli_error($con));
    }
}

if($_SERVER['REQUEST_METHOD']== 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Insert data into the database
  $sql = "INSERT INTO registration (username, password) VALUES ('$username', '$password')";
  $result = mysqli_query($con, $sql);

  if (!$result) {
      die("Error: " . mysqli_error($con));
  } else {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Super!!</strong> You are successfully signed up.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-md d-flex flex-column align-items-center mt-5">
      <h1 class="text-primary">Sign Up Page</h1>
    <?php
    if($user){
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!!</strong> User already exists.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } 
    ?>

<?php
    if($success){
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Super!!</strong> You are succesfully signed up.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } 
    ?>

      <form class="w-50" action="sign.php" method="post">
        <div class="mb-3 mt-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" placeholder="Enter your name" class="form-control" aria-describedby="emailHelp" name="username">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" placeholder="Enter your Password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark w-100">Sign Up</button>
      </form>
    </div>
  </body>
</html>