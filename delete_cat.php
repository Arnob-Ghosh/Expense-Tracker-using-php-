<?php

    include("db_con.php");
    $conn= connect();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query="DELETE FROM categories WHERE id = $id";
            $data=mysqli_query($conn,$query);

            if($data)
            {
                header("Location: view_cat.php"); 
            }
            else{
                echo "unavail to delete data from database ";
            }
        }

?>