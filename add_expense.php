<?php 
    include_once("db_con.php");
    $conn= connect();
    if(isset($_POST['submit'])){
        
          $c_name = $_POST['select_category'];
          $amount = $_POST['amount'];
          $date = $_POST['date'];
    
          $query = "INSERT INTO expense (category, amount, date) VALUES ('$c_name','$amount','$date')";

          $result = mysqli_query($conn,$query);
    
          if ($result === TRUE) {
            header("Location: index.php");
          } 
          else {
            echo 'error';
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

    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="amount">Date</label>
                <input type="date" class="form-control col-6 mb-3" id="date" name="date" max="<?= date('Y-m-d'); ?>">

                <select class="form-control mb-3 col-6" id="select_category" name="select_category" required>
                    <option value="">Select Option</option>
                    <?php
                      $query = "SELECT  *  FROM categories ";
                      $data = mysqli_query($conn, $query);

                      while($category= mysqli_fetch_array($data))
                      {
                        echo "<option value=".$category['id'].">".$category['category']."</option>";
                      }
                      
                    ?>
                </select>

                <label for="amount">Add Amount</label>
                <input type="number" class="form-control col-6 " id="amount" name="amount" placeholder="Enter amount number..">
                <button class="btn btn-success mt-4" name="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>