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



$query = "UPDATE `client_profile` SET `firstName`='$fName',`lastName`='$lName',`date`='$date'
 WHERE clientUId = $clientUId ";
$exe=mysqli_query($conn,$query);
if($exe)
{
	$_SESSION['clientName'] = $fName;
	
	
	 header("Location:../edit-address.php");
}


?>