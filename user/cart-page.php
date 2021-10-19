<?php
include_once("../db/db.php");
$couponId = $_GET['id'];


session_start();
if ($_SESSION["clientUId"] == '') {
	header("Location:../index.php");
}
?>
<?php
$totalCoupons = 0;
$clientUId = $_SESSION["clientUId"];
$query = "SELECT * FROM `coupons` WHERE status='active' and id ='$couponId'";
$exe = mysqli_query($conn, $query);

if (mysqli_num_rows($exe) > 0) {

	$count = "SELECT COUNT(id) AS totalPurchasedCoupons FROM `coupons_sold` 
	WHERE clientUId = '$clientUId' and couponId='$couponId' and paymentStatus = 'complete'";
	$execute = mysqli_query($conn, $count);
	$soldCoupons = mysqli_fetch_assoc($execute);
	$totalCoupons = $soldCoupons['totalPurchasedCoupons'];

	if ($totalCoupons == 10) {
		$_SESSION["message"] = "You are allowed to buy only 10 coupons";
		$_SESSION["msgClr"] = "red";
		header("Location:status.php");
	}
	$data = mysqli_fetch_assoc($exe);
	$couponsLeft =  $data['totalCoupons'] - $data['soldCoupons'];
} else {
	header("Location:show-all-coupons.php");
}

?>
<style type="text/css">
	.order {
		border: 3px solid #007D71;
		background: #CDCDCD;
	}

	.summury {
		padding: 1%;
	}
</style>
<title>Add new coupon</title>
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
			<h1><i class="fa fa-cart-plus "></i> Coupon Cart </h1>
			<!--           <p>Start a beautiful journey here</p> -->
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="row">
						<div class="clearix"></div>
						<div class="col-md-7">
							<div class="col-md-12">
								<h4>INSTRUCTIONS</h4>
								<ul>
									<li>You are allowed to buy only 10 coupons at a time.</li>
								</ul>
								<h4>NEED HELP ?</h4> <a href="#">Contact us</a>
							</div>
							<div class="col-md-12" style="margin-top:35%">
								<h4>ACCEPTED PAYMENT METHODS</h4> <img width=180px src="images/we-accept.jpg">
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-4 order">
							<!-- <h3 class="tile-title">Subscribe</h3> -->
							<div class="tile-body">
								<form class="row" method="post" data-bvalidator-validate action="razorpay/pay.php">
									<input type="hidden" value="<?php echo $couponsLeft ?>" id="couponsLeftId">
									<input type="hidden" value="<?php echo  $totalCoupons ?>" id="totalCouponsId">
									<input type="hidden" id="clientUId" name="clientUId" value="<?php echo $_SESSION['clientUId']; ?>">
									<input type="hidden" id="couponId" name="couponId" value="<?php echo $data['id']; ?>">
									<input type="hidden" id="couponPrice" name="couponPrice" value="<?php echo $data['couponPrice']; ?>">
									<center> <strong>
											<br>By placing your order, you agree to the terms and condition
										</strong> </center>
									<div class="form-group col-md-12">
										<h3><br>PLACE ORDER</h3>
										<p>Coupon Name : <strong style="color:#007D71"><?php echo $data['couponName']; ?></strong> </p>
										<p>Coupon Price : <strong style="color:#007D71">Rs <?php echo $data['couponPrice']; ?>/-</strong> </p>
										<p style="background: #007D71;color:white;padding:1%;">Coupons left to buy :
											<?php echo $couponsLeft; ?>
										</p>
										<p style="background: #007D71;color:white;padding:1%;" id="previouCoupons"></p>
										<hr>
										<div class="form-group col-md-12">
											<label class="control-label">Qty</label>
											<input class="form-control" type="text" id="qty" name="qty" data-bvalidator="required" min="1" max="10">
										</div>
										<div class="form-group col-md-12">
											<label class="control-label">Total amount to be paid</label>
											<h4 id="amt"></h4>
										</div>
										<input type="hidden" id="price" name="price" value="<?php echo $data['couponPrice']; ?>">
										<div class="col-md-12">
											<p class="warn alert alert-dismissible alert-danger" id="warning"></p>
										</div>
										<div class="form-group col-md-12 ">
											<button class="btn btn-primary btn-lg btn-block payNow" type="submit"> Pay Now</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<button style="display:none;" id="rzp-button1">Pay</button>
<!-- Footer Starts-->
<?php include_once("includes/footer.php"); ?>
<!-- Footer Ends-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script type="text/javascript">
	var totalCoupons = $("#totalCouponsId").val();
	var couponsLeft = $("#couponsLeftId").val();
	$(document).ready(function() {
		$("#previouCoupons").css('display', 'none');
		if (totalCoupons != 0) {
			if (totalCoupons == 1) {
				$("#previouCoupons").css('display', 'block');
				$("#previouCoupons").html("Previouly purchased coupon : " + totalCoupons + " ");
			} else {
				$("#previouCoupons").css('display', 'block');
				$("#previouCoupons").html("Previouly purchased coupons : " + totalCoupons + " ");
			}
		}
		$(".warn").css("display", 'none');
		$(".payNow").click(function(e) {
			e.preventDefault();

			var couponId = $("#couponId").val();
			var clientUId = $("#clientUId").val();
			var qty = $("#qty").val();

			if (qty != '') {

				$(".warn").css("display", 'block');
				$("#warning").html("Please wait..");

				// New version razorpay starts

				// AJAX CALL STARTS

				$.ajax({
					url: 'https://svld-razorpay-api.herokuapp.com/create-order',
					data: JSON.stringify({
						couponId: couponId,
						clientUId: clientUId,
						qty: qty
					}),
					contentType: 'application/json',
					type: 'POST',
					dataType: 'json',
					success: function(response) {
						$("#warning").html("Creting new order.Please wait..");
						console.log(response);
						// Status starts
						if (response.status == "created") {

								swal("Please do not refresh the page..")
									.then((value) => {

												// Razorpay starts
											$("#warning").html("Order creted.Please wait..");
											var options = {
												"key": "rzp_live_3fu80DFDiZbJ4L",
												"amount": response.amount,
												"currency": "INR",
												"name": response.notes.couponName,
												"description": "Order Id : " + response.id,
												"image": "https://cdn-icons-png.flaticon.com/512/438/438526.png",
												"order_id": response.id,
												"handler": function (response) {
													$("#warning").html("Updting payment details.Please wait..");
													console.log(response);

													//Store to db starts
													let paymentId = response.razorpay_payment_id;
													let orderId = response.razorpay_order_id;
													let signature = response.razorpay_signature;

													$.ajax({
														url: 'newRazorpay/update-order.php',
														data: {
															paymentId: paymentId,
															orderId: orderId,
															signature: signature,
															clientUId: clientUId,
															couponId: couponId,
															qty:qty

														},
														type: 'POST',
														success: function (response) {
															console.log(response);
															if(response == 400){
																$("#warning").html("Payment Failed");
																swal({
																	title: "Payment failed",
																	text: "",
																	icon: "warning",
																	button: "Close",
																});
															} else if(response == 200){
																$("#warning").css("display",'none');
																swal({
																	title: "Payment successful",
																	text: "",
																	icon: "success",
																	button: "Close",
																});
															}
															


														}
													});

													// Store to db ends


												},
												"prefill": {
													"name": "",
													"email": "svld@gmail.com",
													"contact": clientUId
												},


											};


											var rzp1 = new Razorpay(options);
											
											rzp1.on('payment.failed', function (response) {
												console.log("Order failed...");
												console.log(response);
												//Store to db starts
												let code = response.error.code;
												let description = response.error.description;
												let source = response.error.source;
												let step = response.error.step;
												let reason = response.error.reason;
												let orderId = response.error.metadata.order_id;
												let paymentId = response.error.metadata.payment_id;

												$.ajax({
													url: 'newRazorpay/failed-order.php',
													data: {
														code: code,
														description: description,
														source: source,
														step: step,
														reason: reason,
														orderId: orderId,
														paymentId: paymentId,
														clientUId: clientUId,
														clientUId:clientUId,
														couponId:couponId

													},
													
													type: 'POST',
													
													success: function (response) {
														$("#warning").css("display",'none');
														//Payment failed starts
														if (response == 200) {


															swal({
																title: "Payment Failed",
																text: "",
																icon: "error",
																button: "Close",
															});

														} else {

															swal({
																title: "Error while processing please contact admin",
																text: "",
																icon: "error",
																button: "Close",
															});

														}
														// Payment failed ends

													}
												});

												// Store to db ends

											});

											rzp1.open();
											
											e.preventDefault();


											// Razor pay ends


										
									});

						}
						// Status Ends
					}
				});




				// AJAX CALL ENDS


				// New version razorpay ends





			}
		});
		$("#qty").keyup(function() {
			var price = $("#price").val();
			var qty = $("#qty").val();
			var onlyNumRg = '^[0-9]+$';
			if (!qty.match(onlyNumRg)) {
				$("#qty").val('');
				$("#amt").html('');
			} else if (qty > 10) {
				$("#qty").val('');
				$("#amt").html('');
				$(".warn").css("display", 'block');
				$("#warning").html("You are allowed to buy only 10 coupons");
			} else if (qty <= 0 || qty == '') {
				$("#qty").val('');
				$("#amt").html('');
				$(".warn").css("display", 'block');
				$("#warning").html("Please enter valid Qty.");
			} else {
				$(".warn").css("display", 'none');
				$("#warning").html("");
				total = price * qty;
				$("#amt").html('Rs ' + total + '/-');

			}
		});
	});
</script>
</body>

</html>