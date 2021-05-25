<?php
session_start();
include_once ('../../db/db.php');
if(isset($_POST['uName']) && isset($_POST['pwd'])){
    
     $uName = $_POST['uName'];
     $pwd = $_POST['pwd'];
    
    $query="SELECT * FROM `admin` WHERE userName='$uName' and password = '$pwd'";
    $exe=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($exe)>0)
    {
        $data=mysqli_fetch_assoc($exe);
        $_SESSION['adminUName'] = $data['name'];
       
        echo 200;
        
    }else {
        
        
        
        echo "Please enter correct username and password..!";
    }
    
    
} else {
    header("Location:../index.php");
}
?>