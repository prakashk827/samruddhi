<?php
session_start();

include_once("../../db/db.php");
if($_POST['mobile'] !='' &&  $_POST['pwd'] != ''){

	 $uName = $_POST['mobile'];
	 $pwd = $_POST['pwd'];
	 $status = 'active';
	 $blocked = 'no';
	 $date = date("d-m-Y");
	 $image = 'images/clientProfile/profile.png';


	$query="SELECT * FROM `client_profile` WHERE clientUId='$uName'";
	$exe=mysqli_query($conn,$query);

	if(mysqli_num_rows($exe)>0)
	{
	   echo "Mobile Number Exits";
	}else {

		$query="INSERT INTO `client_profile`(`clientUId`,`password`, `date`, `image`, `status`, `blocked`) VALUES ('$uName','$pwd','$date','$image','$status','$blocked')";
		$exe=mysqli_query($conn,$query);
		if(!$exe)
		{

			echo "Error while inserting client general info.";
		}

		$query= "INSERT INTO `client_address`(`clientUId`) VALUES ('$uName')";
		$exe=mysqli_query($conn,$query);
		if(!$exe)
		{
			echo "Error while inserting client address.";
		}

		$query = "INSERT INTO `payment_trials`(`clientUId`, `triedTimes`) VALUES ('$uName',0)";
		$exe=mysqli_query($conn,$query);
		if(!$exe)
		{
			echo "Error while inserting payment trials.";
		}



			

		$_SESSION["clientUId"] = $uName;
		header("Location:../edit-profile.php");
		
	}

} else {
	echo "Some thing went wrong";
}



?>