<?php
    include_once("db_con.php");
    $conn= connect();

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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">AMount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $query = "SELECT * FROM expense ";
              $result = mysqli_query($conn, $query);
              $i=0;
              while($data= mysqli_fetch_array($result))
              {
            ?>
                <tr>
                    <th scope="row"><?php echo $data['id']; ?></th>
                    <td><?php echo $data['category']; ?></td>
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