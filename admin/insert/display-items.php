<?php
session_start();
include_once ("../../db/db.php");
if(isset($_POST['type'])){
            $name = '';
            if($_POST['type'] == 'fabrics'){
                $name = 'fabrics';
                $query = "SELECT * FROM `product_fabric_names` ORDER BY id DESC";
            } 
            
            if($_POST['type'] == 'categories'){
                $name = 'categories';
                $query = "SELECT * FROM `products_category_names` ORDER BY id DESC";
            } 
            
            if($_POST['type'] == 'sizes'){
                $name = 'sizes';
                $query = "SELECT * FROM `product_cloth_size` ORDER BY id DESC";
            } 
            
                $output = '';
                
                $exe = mysqli_query($conn, $query);
                if (mysqli_num_rows($exe) > 0) {
                    while ($data = mysqli_fetch_assoc($exe)) {
                      
                        $output .='<input  type="checkbox" id="'.$data['name'].'" name="'.$name.'">';

                    }
                }
                
                echo $output;
            }
    



?>