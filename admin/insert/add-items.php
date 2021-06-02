<?php 
session_start();
include_once ("../../db/db.php");
if(isset($_POST['item'])){
    
    $date = date('d-m-Y');
    $time = date("h-i-sa");
    
        if($_POST['item'] == 'fabric') {
            $val =  $_POST['inputVal'];
            $query = "INSERT INTO `product_fabric_names`(`time`, `date`, `name`) VALUES ('$time','$date','$val')";
            $exe = mysqli_query($conn, $query);
            if(!$exe){
                echo "Error while adding new fabric";
            } else{
                echo "New fabric name added";
            }
            
        } 
        
        if($_POST['item'] == 'category') {
            $val =  $_POST['inputVal'];
            $query = "INSERT INTO `products_category_names`(`time`, `date`, `name`) VALUES ('$time','$date','$val')";
            $exe = mysqli_query($conn, $query);
            if(!$exe){
                echo "Error while adding new category";
            } else{
                echo "New category added";
            }
        }
        
        if($_POST['item'] == 'size') {
            $val =  $_POST['inputVal'];
            $query = "INSERT INTO `product_cloth_size`(`time`, `date`, `name`) VALUES ('$time','$date','$val')";
            $exe = mysqli_query($conn, $query);
            if(!$exe){
                echo "Error while adding new size";
            } else{
                echo "New size added";
            }
        }
    
    
}
?>