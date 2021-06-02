<?php
session_start();
include_once ("../../db/db.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "DELETE FROM `product_list` WHERE id = '$id'";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
        
        echo "Deleted..!";
    }
}

?>