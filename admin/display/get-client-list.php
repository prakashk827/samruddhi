<?php
include_once ("../../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>
<!-- Modal -->
<?php
if (isset($_POST['clientUId'])) {
    
    $clientUId = $_POST['clientUId'];
    
    $query = "SELECT * FROM `client_profile`  WHERE clientUId = '$clientUId' ";
    $exe = mysqli_query($conn, $query);
    $profile = mysqli_fetch_assoc($exe);
    
    $query = "SELECT * FROM `client_address`  WHERE clientUId = '$clientUId' ";
    $exe = mysqli_query($conn, $query);
    $address = mysqli_fetch_assoc($exe);
}
?>
<style>
.modalTblHeader {
	color:red;
	width:42%;
}
</style>
<div class="row">
	<div class="col-md-12">

		<div class="table-responsive">
			<table class="table" id="sampleTable">
				<thead>

				</thead>

				<tbody>

					<tr>
						<th class="modalTblHeader" width="40%">Date of Registration :</th>
						<td><?php echo $profile['date']?></td>
					</tr>

					<tr>
						<th class="modalTblHeader" width="40%">First Name :</th>
						<td><?php echo $profile['firstName'] == '' ? 'Not Provided' : $profile['firstName']; ?></td>
					</tr>
					<tr>
						<th class="modalTblHeader" width="40%">Last Name :</th>
						<td><?php echo $profile['lastName'] == '' ? 'Not Provided' : $profile['lastName']; ?></td>
					</tr>

					<tr>
						<th class="modalTblHeader" width="40%">Mobile Number :</th>
						<td><?php echo $profile['clientUId'] == '' ? 'Not Provided' : $profile['clientUId'];?></td>
					</tr>

					<tr>
						<th class="modalTblHeader"  width="40%">Address :</th>
						<td><?php
						echo $address['houseNo']  == '' ? 'Not Provided' : $address['houseNo'] . ' , ' . $address['street'] . '<br>' . $address['area'] . '<br>' . $address['country'] . '<br>' . $address['state'] . '<br>' . $address['city'] . '<br>' . $address['pincode']?></td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>

