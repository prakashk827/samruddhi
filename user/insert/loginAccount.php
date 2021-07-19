<?php
session_start();

include_once("../../db/db.php");
if(isset($_POST['mobile']) && isset($_POST['pwd']))
{

	 $mobile = $_POST['mobile'];
	 $pwd = $_POST['pwd'];
	 


	$query="SELECT * FROM `client_profile` WHERE clientUId='$mobile' and password = '$pwd'";
	$exe=mysqli_query($conn,$query);

	if(mysqli_num_rows($exe)>0)
	{
	    $data=mysqli_fetch_assoc($exe);
         
         $_SESSION['clientProfile'] = $data['image'];
         $_SESSION['clientName'] = $data['firstName'];
         $_SESSION['clientUId'] = $data['clientUId'];

         echo 200;
         
	}else {
			echo 400;
		
	}

} else {
			header("Location:../index.php");
}



?>