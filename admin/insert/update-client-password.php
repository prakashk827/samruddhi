<?php
include_once ("../../db/db.php");

$couponId = $_POST['id'];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "UPDATE `client_profile` SET `password`='123' WHERE clientUId = $id";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
        
        echo "New Password is 123";
    }
}

?>