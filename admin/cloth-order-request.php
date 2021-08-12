-<?php
	session_start();
	include_once("../db/db.php");

	?>

<title>Cloth Order Requests</title>
<?php include_once("includes/head.php"); ?>


<!-- Navbar starts-->
<?php include_once("includes/navbar.php"); ?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php"); ?>
<!-- Sidebar menu ends-->


<main class="app-content">
	<div class="app-title">
		<div>
			<h1>
				<i class="fa fa-external-link-square"></i> Cloth Order Requests
			</h1>
			<p>
				Showing all clients details who requested for cloth
			</p>
		</div>
		<ul class="app-breadcrumb breadcrumb side">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

			<li class="breadcrumb-item active"><a href="dashboard.php">dashboard</a></li>
		</ul>
	</div>
	<button style="display: none" type="button" id="modalBtn" data-toggle="modal" data-target="#myModal">Open Modal</button>

	<div class="row">

		<div class="col-md-12">

			<div class="tile">
				<div class="tile-body">


					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="sampleTable">
							<thead>
								<tr>
									<th>Requested Date</th>
									<th>Requested Time</th>
									<th>ClientUId</th>
									<th>Full Name</th>
									<th>Coupon Name</th>
									<th>Qty</th>
									<th>Size</th>
									<th>Fabric</th>
									<th>Category</th>
									<th>Total Price</th>
									<th>Discount</th>
									<th>After Discount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$query = "SELECT firstName,lastName,client_profile.clientUId,
 winner_cloth_orders.date,winner_cloth_orders.time,winner_cloth_orders.couponId,qty,size,fabric,category,totalPrice,
 discount,afterDiscount
FROM client_profile 
INNER JOIN winner_cloth_orders 
ON client_profile.clientUId = winner_cloth_orders.clientUId  
WHERE winner_cloth_orders.status='pending'";

								$exe = mysqli_query($conn, $query);

								if (mysqli_num_rows($exe) > 0) {
									while ($data = mysqli_fetch_assoc($exe)) {
										$couponId = $data['couponId'];
										$sel = "SELECT * FROM coupons WHERE id = $couponId ";
										$execute = mysqli_query($conn, $sel);
										$result = mysqli_fetch_assoc($execute);

								?>
										<tr>
											<td><?php echo $data['date'] ?></td>
											<td><?php echo $data['time'] ?></td>
											<td><?php echo $data['clientUId'] ?></td>
											<td><?php echo $data['firstName'] . ' ' . $data['lastName']; ?></td>
											<td data-toggle="tooltip" title="Client was winner of this coupon"><?php echo 'coupon Name'  ?></td>
											<td><?php echo $data['qty']  ?></td>
											<td><?php echo $data['size']  ?></td>
											<td><?php echo $data['fabric']  ?></td>
											<td><?php echo $data['category']  ?></td>

											<td><?php echo $data['totalPrice']  ?></td>
											<td><?php echo $data['discount']  ?></td>
											<td><?php echo $data['afterDiscount']  ?></td>
											<td><button data-toggle="tooltip" title="Click here to complete process" class="finishBtn btn-sm btn btn-danger" data-clientUId="<?php echo $data['clientUId']; ?>" data-couponId="<?php echo $data['couponId'] ?>">Finish</button></td>
										</tr>
								<?php
									}
								} else {
									echo "No rocords found";
								}


								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<style type="text/css">
</style>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Client Info.</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<!-- Footer Starts-->
<?php include_once("includes/footer.php"); ?>
<!-- Footer Ends-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$('#sampleTable').DataTable();
</script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
	$(document).ready(function() {

		$('.finishBtn').click(function() {
			var clientUId = $(this).attr("data-clientUId");
			var couponId = $(this).attr("data-couponId");
			swal({
				title: "Did you ship order to this person ? ",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes",
				cancelButtonText: "No",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {

					$.post("insert/buyCloth.php", {
							clientUId: clientUId,
							couponId: couponId
						},
						function(data) {
							swal("Done!", data, "success");
							window.location.href = "sale-back-request.php";
						});

				} else {
					swal("Cancelled", "", "error");
				}
			});
		});



	});
</script>
</body>

</html>