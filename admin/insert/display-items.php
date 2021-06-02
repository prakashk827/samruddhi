<?php
session_start();
include_once ("../../db/db.php");
if(isset($_POST['type'])){
            
            if($_POST['type'] == 'fabrics'){
                $query = "SELECT * FROM `product_fabric_names` ORDER BY id DESC";
            } 
            
            if($_POST['type'] == 'categories'){
                $query = "SELECT * FROM `products_category_names` ORDER BY id DESC";
            } 
            
            if($_POST['type'] == 'sizes'){
                $query = "SELECT * FROM `product_cloth_size` ORDER BY id DESC";
            } 
            
                $output = '<option value="">Please Select</option>';
                
                $exe = mysqli_query($conn, $query);
                if (mysqli_num_rows($exe) > 0) {
                    while ($data = mysqli_fetch_assoc($exe)) {
                        $output .= '<option value=" '. $data['id']. '">'.$data['name'].'</opton>';
                    }
                }
                
                echo $output;
            }
    



?>