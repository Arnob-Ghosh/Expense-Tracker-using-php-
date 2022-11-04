
<?php
include_once("db_con.php");
$conn= connect();
$date1='';
$date2='';
if(isset($_POST['submit']))
{ 

    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
}

?>

 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPENSE TRACKER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php 
        include_once("nav.php")
    ?>
     <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
            <label for="amount">START DATE</label>
                <input type="date" class="form-control col-6 mb-3" id="date1" name="date1" value="<?php echo $date1;?>">
                <label for="date">END DATE</label>
                <input type="date" class="form-control col-6 mb-3" id="date2" name="date2" value="<?php echo $date2;?> ">

                
                <button class="btn btn-success mt-4" name="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">AMOUNT</th>
                    <th scope="col">DATE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php

              $query = "SELECT * from  expense WHERE date BETWEEN '$date1' AND '$date2'";
              $result = mysqli_query($conn, $query);
              $i=0;
              
              while($data= mysqli_fetch_array($result))
              {
              
            ?>
                <tr>
                    <th scope="row"><?php echo $data['id']; ?></th>
                    <?php
                        $cat_id = $data['category'];
                        $query_cat = "SELECT * FROM categories where id = '$cat_id' ";
                        $result_cat = mysqli_query($conn, $query_cat);
                        $data1= mysqli_fetch_array($result_cat);
                    ?>
                    <td><?php echo $data1['category']; ?></td>
                    <td><?php echo $data['amount']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $data["id"]; ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="delete.php?id=<?php echo $data["id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
              $i++;
              }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>