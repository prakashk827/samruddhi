<?php
include_once ("../db/db.php");
session_start();
if (!isset($_SESSION["clientUId"])) {
    header("Location:../index.php");
}
?>
<title>Sale Back</title>
<?php include_once("includes/head.php");?>


<!-- Navbar starts-->
<?php include_once("includes/navbar.php");?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php");?>
<!-- Sidebar menu ends-->
<?php 
//Go to login page if client does not exits
$clientUId = $_SESSION['clientUId'];

/* $sel = "SELECT * FROM `winner_coupons` WHERE clientUId = '$clientUId'";
$exe = mysqli_query($conn, $sel);

if(mysqli_num_rows($exe) == 0) {
    header("Location:../index.php");
} */


?>
<main class="app-content">
<div class="app-title">
	<div>
		<h1>
			<i class="fa fa-refresh"></i> Sale Back
		</h1>
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
					<div class="col-md-12">

						<!-- <h3 class="tile-title">Subscribe</h3> -->
						<div class="tile-body">
							<form class="row" method="post" data-bvalidator-validate
								action="insert/saleBack.php">
								<div class="form-group col-md-4">
									<label class="control-label">Coupon Name</label> <select
										class="form-control" name="couponId" data-bvalidator="required">
										<option value="">Please Select
										</option>
                  <?php
                
$query = "SELECT couponName,couponId FROM coupons INNER JOIN  `winner_coupons` ON coupons.id = winner_coupons.couponId 
WHERE  winner_coupons.clientUId='$clientUId' AND orderType = '' AND orderShipped = 'no' AND published='yes'";
                $exe = mysqli_query($conn, $query);
               
                if(mysqli_num_rows($exe) > 0){

                    while ($data = mysqli_fetch_assoc($exe)) {
                        ?>
                                        
                        <option  value="<?php echo $data['couponId']; ?>">
                        <?php echo $data['couponName']; ?>
                        </option>
                                            
                                     <?php
                    
}
                } 
                ?>
                  </select>
								</div>
								<div class="form-group col-md-8"></div>
								<div class="form-group col-md-4">
									<label class="control-label">Reason</label> <select
										data-bvalidator="required" name="reason" class="form-control">
										<option value="">Please select</option>
										<option>I have so many cloth this type</option>
										<option>Already have this colors,design,fabric</option>
										<option>Not interested to purchase</option>
									</select>
								</div>

								<div class="form-group col-md-12 align-self-end">
									<button class="btn btn-primary" name="saleBack" type="submit">
										<i class="fa fa-refresh"></i>Sale Back
									</button>
								</div>

								<div class="col-md-12">
									<center id="warning"></center>
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


<!-- Footer Starts-->
<?php include_once("includes/footer.php");?>
<!-- Footer Ends-->


</body>
</html>