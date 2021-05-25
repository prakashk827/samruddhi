<?php
session_start();

include_once("../../db/db.php");
if(isset($_POST['uName']) && isset($_POST['pwd'])){
    
    $uName = $_POST['uName'];
    $pwd = $_POST['pwd'];
    
    
    
    $query="SELECT * FROM `admin` WHERE userName='$uName' and password = '$pwd'";
    $exe=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($exe)>0)
    {
        $data=mysqli_fetch_assoc($exe);
        
        $_SESSION['clientProfile'] = $data['image'];
        $_SESSION['clientName'] = $data['firstName'];
        $_SESSION['clientUId'] = $data['clientUId'];
        
        header("Location:../edit-profile.php");
        
    }else {
        
        $_SESSION["message"] = "Please provide valid mobile number and password..!";
        $_SESSION["msgClr"] = "red";
        header("Location:../status.php");
    }
    
} else {
    header("Location:../index.php");
}



?>