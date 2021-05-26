<?php
session_start();

include_once("../../db/db.php");
if($_POST['mobile'] !='' &&  $_POST['pwd'] != ''){
    
     date_default_timezone_set('Asia/Kolkata');
	 $mobile = $_POST['mobile'];
	 $pwd = $_POST['pwd'];
	 $status = 'active';
	 $blocked = 'no';
	 $date = date("d-m-Y");
	 $image = 'images/clientProfile/profile.png';
	 $date = date('Y-m-d');
	 $time = date("h:i:sa");


	$query="SELECT * FROM `client_profile` WHERE clientUId='$mobile'";
	$exe=mysqli_query($conn,$query);

	if(mysqli_num_rows($exe)>0)
	{
	   echo "Mobile Number Exits";
	}else {

		$query="INSERT INTO `client_profile`(`clientUId`,`password`, `date`, `image`, `status`, `blocked`) VALUES ('$mobile','$pwd','$date','$image','$status','$blocked')";
		$exe=mysqli_query($conn,$query);
		if(!$exe)
		{
			echo "Error while inserting client general info.";
		}

		$query= "INSERT INTO `client_address`(`clientUId`) VALUES ('$mobile')";
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
		header("Location:../edit-profile.php");
		
	}

} else {
	echo "Some thing went wrong while registering ";
}



?>