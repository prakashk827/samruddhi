<?php
session_start();

include_once("../db/db.php");
if($_POST['mobile'] !='' &&  $_POST['pwd'] != ''){
    
    
    $mobile = $_POST['mobile'];
    $pwd = $_POST['pwd'];
    $status = 'active';
    $blocked = 'no';
    $date = date("d-m-Y");
    $image = 'images/clientProfile/profile.png';
    $date = date('Y-m-d');
    $time = date("h:i:sa");
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $time = date('h:i:sa');
    $city = $_POST['city'];
   
    
    $query="SELECT * FROM `client_profile` WHERE clientUId='$mobile'";
    $exe=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($exe)>0)
    {
        $_SESSION["message"] = "This mobile number already exist. <br> Please register with another one..!";
        $_SESSION["msgClr"] = "red";
        header("Location:../404.php");
        
        
    }else {
        
        $query="INSERT INTO `client_profile`(`clientUId`,`password`, `date`, `image`, `status`,`firstName`,`lastName`,`time`) 
        VALUES ('$mobile','$pwd','$date','$image','$status','$fName','$lName','$time')";
        $exe=mysqli_query($conn,$query);
        if(!$exe)
        {
            echo "Error while inserting client general info.";
        }
        
        $query= "INSERT INTO `client_address`(`clientUId`,`city`) VALUES ('$mobile','$city')";
        $exe=mysqli_query($conn,$query);
        if(!$exe)
        {
            echo "Error while inserting client address.";
        }
        
        
        $query = "INSERT INTO `payment_trials`(`clientUId`, `triedTimes`) VALUES ('$mobile',0)";
        $exe=mysqli_query($conn,$query);
        if(!$exe)
        {
            echo "Error while inserting payment trials.";
        }
        
        $_SESSION["clientUId"] = $mobile;
        header("Location:../user/show-all-coupons.php");
        
    }
    
} else {
    echo "Some thing went wrong while registering ";
}



?>