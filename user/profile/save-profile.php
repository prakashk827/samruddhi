<?php
include_once("../../db/db.php");
session_start();

if($_SESSION["clientUId"] == '') {
  header("Location:../index.php");
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$date = date('d-m-Y');
$clientUId = $_POST['clientUId'];

//Image Upload
$size=$_FILES["photo"]["size"];
$error=$_FILES["photo"]["error"];
$file_name=$_FILES["photo"]["name"];
if($file_name != ""){

		$file_name=time()."_"."_".'samruddhi_vasthralay_sira'.$file_name;
		$temp_name=$_FILES["photo"]["tmp_name"];
		$folder="../images/clientProfile/".$file_name;
		move_uploaded_file($temp_name, $folder);

		$query_to_del_image="SELECT * FROM `client_profile` WHERE clientUId='$clientUId' LIMIT 1";
		$exe_del_image=mysqli_query($conn,$query_to_del_image);
	 
		if(mysqli_num_rows($exe_del_image)>0)
		   {
			 $del_img=mysqli_fetch_assoc($exe_del_image);
			 unlink("/images/clientProfile/".$del_img['image']);
		   }
	
		$query = "UPDATE `client_profile` SET `image`='$file_name' WHERE clientUId = $clientUId ";
		$exe=mysqli_query($conn,$query);

}


$query = "UPDATE `client_profile` SET `firstName`='$fName',`lastName`='$lName',`date`='$date'
 WHERE clientUId = $clientUId ";
$exe=mysqli_query($conn,$query);
if($exe)
{
	$_SESSION['clientName'] = $fName;
	
	
	 header("Location:../edit-address.php");
}


?>