<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
  }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-md d-flex flex-column align-items-center mt-5">
      <h1 class="text-warning">Welcome</h1>
    
    <?php 
    echo $_SESSION['username']; 
    
    ?>
      <div>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </body>
</html>