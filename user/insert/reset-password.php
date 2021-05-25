<?php
session_start();
if($_SESSION["clientUId"] == '') {
  header("Location:../index.php");
}

include_once("../../db/db.php");


 if($_POST['pwd'] != '' ){

 	$pwd = $_POST['pwd'];
 	$clientUId = $_POST['clientUId'];
 	$sel = "SELECT * FROM `client_profile` WHERE clientUId='$clientUId'";
 	$exe=mysqli_query($conn,$sel);
 	$data=mysqli_fetch_assoc($exe);
 	if($data['password'] == $pwd ) {
 	?>
 		<div class="alert alert-dismissible alert-warning">
               Your old password and new password should not be same.
         </div>

 	<?php
 } else {

 	$query = "UPDATE `client_profile` SET `password`='$pwd' WHERE clientUId = $clientUId";
 	$exe=mysqli_query($conn,$query);
		if($exe)
		{ ?>
			 

			 <div class="alert alert-dismissible alert-success">
                Your password has been changed..! <br>Please re-login by using new password.
              </div>
			
		<?php } else {
			echo  "Error while changing password..!";
			
		}

 }
}

?>