<?php 
    include_once("db_con.php");
    $conn= connect();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM categories where id = '$id' ";
        $result = mysqli_query($conn, $query); 
        $data= mysqli_fetch_assoc($result); 
        $cate = $data['category'];
    }    

    if(isset($_POST['submit'])){
        
          $c_name = $_POST['category'];
    
          $query1 = "UPDATE categories SET category = '$c_name'  where id ='$id'";
          $result1 = mysqli_query($conn,$query1);
    
          if ($result1) {
            header("Location: view_cat.php");
          } 
          else {
            echo 'Category Name exsist.';
          }
      }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
        include_once("nav.php");
    ?>

    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
               
                <label for="category">ADD CATEGORY</label>
                <input type="text" class="form-control col-6 " id="category" name="category" value="<?php echo $cate;?>">
                <button class="btn btn-success mt-4" name="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>