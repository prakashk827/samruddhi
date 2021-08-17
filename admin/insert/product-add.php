<?php
session_start();
include_once ("../../db/db.php");
if(isset($_POST['save'])){
    
    
    $date = date('d-m-Y');
    $time = date("h-i-sa");
    $name = $_POST['name'];
    $fabric = $_POST['fabric'];
    $fabricChk="";  
   foreach($fabric as $chk)  
   {  
      $fabricChk .= $chk.",";  
   } 
   
   
    $category = $_POST['category'];
    $categoryChk="";  
    foreach($category as $chk)  
    {  
       $categoryChk .= $chk.",";  
    }

    $size = $_POST['availSize'];
    $sizeChk="";  
    foreach($size as $chk)  
    {  
       $sizeChk .= $chk.",";  
    }
    
    $mrpPrice = $_POST['mrpPrice'];
    $ourPrice =$_POST['ourPrice'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];


    $size=$_FILES["photo"]["size"];
    $error=$_FILES["photo"]["error"];
    $file_name=$_FILES["photo"]["name"];
    $file_name=time()."_"."_".'samruddhi-vasthralaya sira_'.$file_name;

     $file_name;
    
    $temp_name=$_FILES["photo"]["tmp_name"];
     $folder="../../images/product-images/".$file_name;
    
    move_uploaded_file($temp_name, $folder);

    
    $query = "INSERT INTO `product_list`(`photo`,`date`, `time`, `name`, `fabricId`, `categoryId`, `sizeId`, `mrpPrice`, `ourPrice`, `discount`, `discription`) VALUES
    ('$file_name','$date','$time','$name','$fabricChk','$categoryChk','$sizeChk','$mrpPrice','$ourPrice','$discount','$description')";
    $exe = mysqli_query($conn, $query);
    if(!$exe){
        echo "Error while adding new product";
    } else{
        
        header("Location:../products-delete.php");
       
    }

}
?>