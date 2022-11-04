<?php 
    include_once("db_con.php");
    $conn= connect();
    if(isset($_POST['submit'])){
        if (isset($_POST['category']) && !empty($_POST['category']))
        {
          $c_name = $_POST['category'];
    
          $query = "INSERT INTO categories (category) VALUES ('$c_name')";
          $result = mysqli_query($conn,$query);
    
          if ($result === TRUE) {
           "<script> alert('Category Added.')</script>";
          } 
          else {
            "<script> alert('Category Name exsist.')</script>";
          }
        }
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
        include_once("nav.php");
    ?>

    <div class="container">
    <form method="POST">
    <div class="form-group">
        <label for="category">Add Category</label>
        <input type="text" class="form-control col-6" id="category" name="category" placeholder="Enter category name..">

        <button class="btn btn-success mt-2" name="submit" type="submit">Submit</button>
    </div>
    </form>
    </div>
</body>
</html>