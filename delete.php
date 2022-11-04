<?php

    include("db_con.php");
    $conn= connect();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query="DELETE FROM expense WHERE id = $id";
            $data=mysqli_query($conn,$query);

            if($data)
            {
                header("Location: index.php"); 
            }
            else{
                echo "unavail to delete data from database ";
            }
        }

?>