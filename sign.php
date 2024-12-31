
<?php

if($_SERVER['REQUEST_METHOD']== 'POST'){
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO `registration` (username,password) VALUES ('$username', '$password')";
  $result = mysqli_query($con, $sql);

  if($result){
    echo "Registration Successful";
  }else{
    echo "Error: ". mysqli_error($con);
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
      <form class="w-50" action="sign.php" method="post" >
        <div class="mb-3 mt-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" placeholder="Enter your email" class="form-control" aria-describedby="emailHelp" name="username">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" placeholder="Enter your Password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark w-100">Submit</button>
      </form>
    </div>
  </body>
</html>