<title>Showing all coupons
</title>
<?php
session_start();
include_once("../db/db.php");
if ($_SESSION["clientUId"] == '') {
	header("Location:index.php");
}
?>

<style type="text/css">
	#gradient {
		background-image: linear-gradient(to left, #051937, #0b142b, #0c0f21, #070816, #010107);
	}
</style>

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
				<i class="fa fa-tags"></i> Showing all coupons
			</h1>
			<!-- <p>Material design inspired cards</p> -->
		</div>


		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

			<li class="breadcrumb-item"><a href="#">dashboard</a></li>
		</ul>
	</div>

	<h5 class="alert alert-dismissible alert-danger">You are allowed to buy any coupons with maximum of 10 quantities.</h5>

	<div class="row">

		<?php
	
		
		$query = "SELECT DATEDIFF(endDate, startDate) AS daysLeft, coupons.*  FROM `coupons`  WHERE totalCoupons != soldCoupons 
		AND displayType != 'hide' AND endDate > CURRENT_DATE ORDER BY id DESC";

 
		$exe = mysqli_query($conn, $query);

		if (mysqli_num_rows($exe) > 0) {

			while ($data = mysqli_fetch_assoc($exe)) {

				if ( $data['daysLeft'] > 0) {
		?>
					<div class="col-md-6">
						<div class="tile" id="gradient">
							<h2 class="tile-title" style="color: white">
								<i style="color: #9F04F2" class="fa fa-tags"></i> <?php echo $data['couponName'] ?>
							</h2>
							<div class="tile-body">
								<h1 style="color: white; font-size: 45px">
									<sup>Rs </sup><?php echo $data['couponPrice'] ?>/-
								</h1>
								<h4 style="color: #F74005">
									<blink><?php  echo $data['daysLeft'] ?> Days Left to Expire.</blink>
								</h4>
								<p style="color: white">
									<?php echo 'Coupon worth Rs : ' . $data['couponWorth'] ?><br>
									<?php echo 'Sale Back Amount Rs : ' . $data['salebackAmt'] ?><br>
									<?php echo $data['description'] ?>
								</p>
							</div>
							<div class="tile-footer">
								<a id="gradient" style="border: 1px solid white; padding: 1.5%; color: white" class="btn buyBtn" data-id="<?php echo $data['id'] ?>"> Buy Coupon
									Now</a>
							</div>
						</div>
					</div>
		<?php
				}
			}
		} else {
			echo "No coupons found";
		}

		?>
	</div>
</main>



<!-- Footer Starts-->
<?php include_once("includes/footer.php"); ?>
<!-- Footer Ends-->
<script type="text/javascript">
	$(document).ready(function() {
		$(".buyBtn").click(function() {
			var couponId = $(this).attr("data-id");
			window.location.href = "cart-page.php?id=" + couponId;




		});
	});
</script>


</body>

</html>