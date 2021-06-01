<?php
include_once ("../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>





<title>Add new coupon</title>
<?php include_once("includes/head.php");?>


<!-- Navbar starts-->
<?php include_once("includes/navbar.php");?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php");?>
<!-- Sidebar menu ends-->

<main class="app-content">
<div class="app-title">
	<div>
		<h1>
			<i class="fa fa-tags"></i> Update Profile
		</h1>
		<!--           <p>Start a beautiful journey here</p> -->
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="#">Blank Page</a></li>
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
								action="insert/couponController.php">
								<div class="form-group col-md-4">
									<label class="control-label">Coupon Name</label> <select
										class="form-control">
                  <?php
                                    $clientUId = $_SESSION['clientUId'];
                                    $query = "SELECT * FROM `coupons_sold` WHERE  clientUId='$clientUId' and paymentStatus='complete' ORDER BY id DESC";
                                    $exe = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($exe) > 0) {
                                        
                                        while ($data = mysqli_fetch_assoc($exe)) { ?>
                                        
                                        <option value="<?php echo $data['couponId']; ?>"><?php echo $data['couponName']; ?></option>
                                            
                                     <?php   }
                                    } else {
                                        echo "Error while fetching coupon";
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
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-arrow-circle-left"></i>Sale
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
<script type="text/javascript">
      
     /* $(document).ready(function(){
 //Add save class in submit form before use.
$(".save").click(function(){

  var name  = $("#name").val();
  var price = $("#price").val();
  var des = $("#description").val();
  var sDate = $("#startDate").val();
  var eDate = $("#endDate").val();


        $.post("insert/couponController.php",
          {
            name:name,
            price:price,
            des:des,
            sDate:sDate,
            eDate:eDate
          },
          function(data)
          {
            $("#warning").html(data);
           
            
          });
        
      });
            
    });

*/




    </script>

</body>
</html>