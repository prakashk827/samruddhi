<?php
session_start();
include_once ("../../db/db.php");
if(isset($_POST['save'])){
    
    
    $date = date('d-m-Y');
    $time = date("h-i-sa");
    $name = $_POST['name'];
    $fabric = $_POST['fabric'];
    $category = $_POST['category'];
    $size = $_POST['availSize'];
    $mrpPrice = $_POST['mrpPrice'];
    $ourPrice =$_POST['ourPrice'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    
    
    $query = "INSERT INTO `product_list`(`date`, `time`, `name`, `fabricId`, `categoryId`, `sizeId`, `mrpPrice`, `ourPrice`, `discount`, `discription`) VALUES
    ('$date','$time','$name','$fabric','$category','$size','$mrpPrice','$ourPrice','$discount','$description')";
    $exe = mysqli_query($conn, $query);
    if(!$exe){
        echo "Error while adding new product";
    } else{
        echo "New product added";
    }

}
?>